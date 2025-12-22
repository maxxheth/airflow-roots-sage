---
description: Docker naming strategy and conflict prevention
---

# Docker Compose Naming Strategy

## Overview
This document explains how we prevent naming conflicts when deploying multiple WordPress projects on the same server with shared Traefik infrastructure.

## Docker Compose Automatic Namespacing

Docker Compose automatically prevents most conflicts through **project namespacing**:

### Project Name
- **Default**: Directory name (e.g., `airflow-roots-sage`)
- **Override**: Set `COMPOSE_PROJECT_NAME` in `.env`
- **CLI Override**: `docker compose -p myproject up`

### Auto-Prefixed Resources

| Resource Type | Service Name | Actual Name |
|--------------|--------------|-------------|
| Container (auto) | `wordpress` | `airflow-roots-sage-wordpress-1` |
| Container (custom) | `wordpress` | `wp_airflow` (via `container_name`) |
| Network | `internal` | `airflow-roots-sage_internal` |
| Volume | `mysql_data` | `airflow-roots-sage_mysql_data` |

**Result**: Multiple projects can use the same service name (`wordpress`) without conflicts.

## Traefik Naming: The Real Conflict Risk

### ⚠️ Problem
Traefik routers and services are **global** across all containers. Generic names cause conflicts:

```yaml
# ❌ BAD: Will conflict with other projects
- "traefik.http.routers.wordpress.rule=Host(`site1.com`)"
- "traefik.http.routers.wordpress.rule=Host(`site2.com`)"  # CONFLICT!
```

### ✅ Solution: Project-Specific Prefixes

```yaml
# ✅ GOOD: Unique router names per project
- "traefik.http.routers.airflow-wordpress.rule=Host(`airflow.com`)"
- "traefik.http.routers.pms-wordpress.rule=Host(`pms.com`)"
```

## Our Naming Convention

### Service Names (Internal to Compose)
Use **generic, descriptive names** that work with Makefiles and scripts:
- `wordpress` (not `wp_airflow`)
- `mysql`
- `node`

**Why?** Consistency across projects. Your Makefile can use `wordpress` for all projects.

### Container Names (Optional)
Set `container_name` only when you need a specific name:
```yaml
wordpress:
  container_name: wp_airflow  # Custom name for this project
```

**When to use:**
- Legacy scripts reference specific container names
- Debugging/logging requires recognizable names
- Inter-container communication outside Docker networks

**When to skip:**
- Let Docker Compose auto-generate: `<project>-<service>-<replica>`
- Better for scaling (replicas)

### Traefik Router Names (Critical)
**Always use project-specific prefixes:**

```yaml
# Pattern: <project>-<service>[-secure]
- "traefik.http.routers.airflow-wordpress.rule=..."
- "traefik.http.routers.airflow-wordpress-secure.rule=..."
- "traefik.http.services.airflow-wordpress.loadbalancer.server.port=80"
```

## Multi-Project Deployment Example

### Project 1: airflow-roots-sage
```yaml
services:
  wordpress:
    container_name: wp_airflow
    labels:
      - "traefik.http.routers.airflow-wordpress-secure.rule=Host(`airflow.com`)"
      - "traefik.http.services.airflow-wordpress.loadbalancer.server.port=80"
```

### Project 2: pms-ciwg
```yaml
services:
  wordpress:
    container_name: wp_pms
    labels:
      - "traefik.http.routers.pms-wordpress-secure.rule=Host(`pms.com`)"
      - "traefik.http.services.pms-wordpress.loadbalancer.server.port=80"
```

### Project 3: neighborly
```yaml
services:
  wordpress:
    container_name: wp_neighborly
    labels:
      - "traefik.http.routers.neighborly-wordpress-secure.rule=Host(`neighborly.com`)"
      - "traefik.http.services.neighborly-wordpress.loadbalancer.server.port=80"
```

**Result**: All three projects coexist peacefully!

## Verification Commands

### Check for Traefik Router Conflicts
```bash
# List all Traefik routers across all containers
docker ps --format '{{.Names}}' | xargs -I {} docker inspect {} \
  | jq -r '.[].Config.Labels | to_entries[] | select(.key | startswith("traefik.http.routers")) | .key'
```

### Check Container Names
```bash
# List all running containers
docker ps --format 'table {{.Names}}\t{{.Image}}\t{{.Ports}}'
```

### Check Networks
```bash
# List all networks and their containers
docker network ls
docker network inspect <network-name>
```

## Best Practices Summary

1. ✅ **Service names**: Use generic names (`wordpress`, `mysql`, `node`)
2. ✅ **Container names**: Use project-specific names (`wp_airflow`, `wp_pms`) or let Docker auto-generate
3. ✅ **Traefik routers**: Always use project prefixes (`airflow-wordpress-secure`)
4. ✅ **Networks**: Use project-specific names or Docker's auto-generated ones
5. ✅ **Volumes**: Use project-specific names or Docker's auto-generated ones
6. ✅ **Environment variables**: Use `.env` files per project
7. ✅ **Project name**: Set `COMPOSE_PROJECT_NAME` in `.env` for clarity

## Troubleshooting

### Issue: "Address already in use"
**Cause**: Port conflict (e.g., two projects trying to use `3306:3306`)

**Solution**: Use different host ports per project:
```yaml
# Project 1
ports:
  - "3312:3306"

# Project 2
ports:
  - "3313:3306"
```

### Issue: Traefik shows wrong site
**Cause**: Router name conflict

**Solution**: Check router names are unique:
```bash
docker inspect $(docker ps -q) | jq -r '.[].Config.Labels' | grep traefik.http.routers
```

### Issue: Container name conflict
**Cause**: Two projects use same `container_name`

**Solution**: Either:
1. Remove `container_name` (let Docker auto-generate)
2. Use unique names per project

## Related Files
- `docker-compose.yml` - Base configuration
- `docker-compose.prod.yml` - Production overrides
- `.env` - Environment variables (including `COMPOSE_PROJECT_NAME`)
- `Makefile` - Build and deployment commands
