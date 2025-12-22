# Production Deployment Guide

## Overview
This guide covers deploying the Airflow Roots Sage WordPress project to production using Docker Compose with Traefik reverse proxy.

## Production Architecture

### Key Differences from Development

| Aspect | Development | Production |
|--------|-------------|------------|
| **Code Volumes** | Bind mounts (live editing) | Baked into image |
| **Assets** | Vite dev server (HMR) | Pre-compiled, optimized |
| **Database** | Bind mount to `./mysql_data` | Named volume `mysql_data_prod` |
| **Uploads** | Bind mount | Named volume `wordpress_uploads` |
| **Debug** | Enabled (Xdebug) | Disabled |
| **Restart Policy** | None | `unless-stopped` |
| **Health Checks** | Optional | Required |
| **Security Headers** | Basic | HSTS, SSL redirect |
| **TLS** | Self-signed/none | Let's Encrypt |

## Prerequisites

### 1. Server Requirements
- Docker Engine 24.0+
- Docker Compose 2.20+
- Traefik reverse proxy running on `web` network
- Domain DNS pointing to server

### 2. Environment Configuration

Create/update `.env` file:

```bash
# Project
COMPOSE_PROJECT_NAME=airflow-roots-sage

# Domain
DOMAIN=airflow.example.com

# WordPress
WP_ENV=production
WP_HOME=https://airflow.example.com
WP_SITEURL=https://airflow.example.com/wp

# Database
DB_NAME=airflow_prod
DB_USER=airflow_user
DB_PASSWORD=<strong-password-here>
DB_ROOT_PASSWORD=<strong-root-password-here>

# Salts (generate at https://roots.io/salts.html)
AUTH_KEY='generate-unique-key'
SECURE_AUTH_KEY='generate-unique-key'
LOGGED_IN_KEY='generate-unique-key'
NONCE_KEY='generate-unique-key'
AUTH_SALT='generate-unique-salt'
SECURE_AUTH_SALT='generate-unique-salt'
LOGGED_IN_SALT='generate-unique-salt'
NONCE_SALT='generate-unique-salt'
```

### 3. Traefik Network

Ensure Traefik's `web` network exists:

```bash
docker network create web 2>/dev/null || true
```

## Deployment Workflow

### Option 1: Full Automated Deployment

```bash
make prod-deploy
```

This command:
1. Builds production assets (runs `npm run build`)
2. Builds Docker images with production target
3. Starts all services
4. Waits for health checks
5. Shows service status

### Option 2: Step-by-Step Deployment

#### Step 1: Build Production Assets

```bash
make prod-build-assets
```

This runs the node builder container to compile and optimize Sage theme assets.

#### Step 2: Build Production Images

```bash
make prod-build
```

Builds WordPress and MySQL images with production configurations.

#### Step 3: Start Services

```bash
make prod-up
```

Starts all production services in detached mode.

#### Step 4: Verify Deployment

```bash
make prod-status
```

Check that all containers are healthy.

## Production Commands Reference

| Command | Description |
|---------|-------------|
| `make prod-build-assets` | Build production assets only |
| `make prod-build` | Build production Docker images |
| `make prod-build-full` | Build assets + images |
| `make prod-up` | Start production services |
| `make prod-down` | Stop production services |
| `make prod-restart` | Restart production services |
| `make prod-logs` | View production logs (follow) |
| `make prod-status` | Check container health status |
| `make prod-deploy` | **Full deployment** (recommended) |

## Post-Deployment Tasks

### 1. WordPress Installation

If this is a fresh installation:

```bash
# Access WordPress container
docker compose -f docker-compose.yml -f docker-compose.prod.yml exec wordpress bash

# Run WordPress installation
wp core install \
  --url="https://airflow.example.com" \
  --title="Airflow" \
  --admin_user="admin" \
  --admin_password="<secure-password>" \
  --admin_email="admin@example.com" \
  --allow-root
```

### 2. Import Existing Database

```bash
# Copy SQL dump to server
scp backup.sql user@server:/tmp/

# Import database
make db-import f=/tmp/backup.sql
```

### 3. Sync Uploads

```bash
# Sync uploads from development/staging
rsync -avz ./bedrock/web/app/uploads/ \
  user@server:/var/lib/docker/volumes/airflow-roots-sage_wordpress_uploads/_data/
```

## Production Volumes

### Backup Strategy

```bash
# Backup database
docker compose -f docker-compose.yml -f docker-compose.prod.yml exec wordpress \
  wp db export --allow-root - | gzip > backup-$(date +%Y%m%d).sql.gz

# Backup uploads
docker run --rm -v airflow-roots-sage_wordpress_uploads:/data \
  -v $(pwd):/backup alpine tar czf /backup/uploads-$(date +%Y%m%d).tar.gz -C /data .

# Backup database volume
docker run --rm -v airflow-roots-sage_mysql_data_prod:/data \
  -v $(pwd):/backup alpine tar czf /backup/mysql-$(date +%Y%m%d).tar.gz -C /data .
```

### Restore Strategy

```bash
# Restore uploads
docker run --rm -v airflow-roots-sage_wordpress_uploads:/data \
  -v $(pwd):/backup alpine tar xzf /backup/uploads-YYYYMMDD.tar.gz -C /data

# Restore database
gunzip < backup-YYYYMMDD.sql.gz | \
  docker compose -f docker-compose.yml -f docker-compose.prod.yml exec -T wordpress \
  wp db import --allow-root -
```

## Security Considerations

### 1. Security Headers (Automatic)

The production configuration includes:
- **HSTS**: Strict-Transport-Security with 1-year max-age
- **SSL Redirect**: Automatic HTTP → HTTPS
- **X-Robots-Tag**: Prevent indexing of sensitive pages

### 2. File Permissions

WordPress container runs as `www-data` (UID/GID mapped via `HOST_UID`/`HOST_GID`).

### 3. Database Access

- MySQL is on `internal` network only (not exposed to internet)
- External port `3312` is for local access only (firewall recommended)

### 4. Secrets Management

**Never commit `.env` to version control!**

```bash
# Add to .gitignore
echo ".env" >> .gitignore
```

## Monitoring & Health Checks

### Health Check Endpoints

- **WordPress**: `http://localhost/wp/wp-admin/install.php`
  - Interval: 30s
  - Timeout: 10s
  - Retries: 3
  - Start period: 40s

- **MySQL**: `mysqladmin ping`
  - Interval: 10s
  - Timeout: 5s
  - Retries: 5
  - Start period: 30s

### View Health Status

```bash
docker compose -f docker-compose.yml -f docker-compose.prod.yml ps
```

Look for `(healthy)` status.

### View Logs

```bash
# All services
make prod-logs

# WordPress only
docker compose -f docker-compose.yml -f docker-compose.prod.yml logs -f wordpress

# MySQL only
docker compose -f docker-compose.yml -f docker-compose.prod.yml logs -f mysql
```

## Troubleshooting

### Issue: Services Not Starting

**Check logs:**
```bash
make prod-logs
```

**Common causes:**
- Database not healthy (check MySQL logs)
- Environment variables missing
- Port conflicts

### Issue: 502 Bad Gateway

**Cause**: WordPress container not responding

**Solution:**
```bash
# Check WordPress health
docker compose -f docker-compose.yml -f docker-compose.prod.yml exec wordpress curl -f http://localhost/

# Restart WordPress
docker compose -f docker-compose.yml -f docker-compose.prod.yml restart wordpress
```

### Issue: Database Connection Errors

**Check database health:**
```bash
docker compose -f docker-compose.yml -f docker-compose.prod.yml exec mysql \
  mysqladmin ping -h localhost -u root -p
```

**Verify credentials:**
```bash
# Check .env file
grep DB_ .env

# Test connection from WordPress container
docker compose -f docker-compose.yml -f docker-compose.prod.yml exec wordpress \
  wp db check --allow-root
```

### Issue: Assets Not Loading

**Cause**: Assets not built or incorrect paths

**Solution:**
```bash
# Rebuild assets
make prod-build-assets

# Rebuild entire stack
make prod-build-full

# Restart services
make prod-restart
```

### Issue: Let's Encrypt Certificate Errors

**Check Traefik logs:**
```bash
docker logs traefik
```

**Verify DNS:**
```bash
dig +short airflow.example.com
```

**Ensure Traefik certresolver is configured:**
```bash
# Check Traefik static config
docker inspect traefik | jq '.[].Config.Labels'
```

## Rolling Updates

### Zero-Downtime Deployment

```bash
# 1. Build new images
make prod-build-full

# 2. Pull new images (if using registry)
docker compose -f docker-compose.yml -f docker-compose.prod.yml pull

# 3. Recreate containers (one at a time)
docker compose -f docker-compose.yml -f docker-compose.prod.yml up -d --no-deps --build wordpress

# 4. Wait for health check
sleep 30

# 5. Verify
make prod-status
```

## Scaling Considerations

### Horizontal Scaling (Multiple WordPress Instances)

```bash
# Scale WordPress to 3 instances
docker compose -f docker-compose.yml -f docker-compose.prod.yml up -d --scale wordpress=3
```

**Note**: Remove `container_name: wp_airflow` from `docker-compose.yml` to allow scaling.

### Resource Limits

Current production limits:
- **WordPress**: 1 CPU, 512MB RAM (reserved: 0.5 CPU, 256MB)
- **MySQL**: 0.5 CPU, 512MB RAM (reserved: 0.25 CPU, 256MB)

Adjust in `docker-compose.prod.yml` based on server capacity.

## Related Documentation

- [Docker Naming Strategy](./docker-naming-strategy.md)
- [Development Setup](../README.md)
- [Traefik Configuration](https://doc.traefik.io/traefik/)
- [Roots Bedrock](https://roots.io/bedrock/)
- [Roots Sage](https://roots.io/sage/)
