# Production Quick Reference

## 🚀 Quick Deploy

```bash
# Full production deployment (one command)
make prod-deploy
```

## 📋 Common Commands

```bash
# Build assets only
make prod-build-assets

# Build Docker images
make prod-build

# Start services
make prod-up

# Stop services
make prod-down

# View logs
make prod-logs

# Check status
make prod-status

# Restart services
make prod-restart
```

## 🔍 Health Checks

```bash
# View container health
docker compose -f docker-compose.yml -f docker-compose.prod.yml ps

# Expected output:
# NAME        STATUS                    PORTS
# wp_airflow  Up 2 minutes (healthy)    80/tcp
# mysql       Up 2 minutes (healthy)    3306/tcp
```

## 💾 Backup & Restore

```bash
# Backup database
make db-export

# Restore database
make db-import f=backup.sql

# Backup uploads volume
docker run --rm \
  -v airflow-roots-sage_wordpress_uploads:/data \
  -v $(pwd):/backup alpine \
  tar czf /backup/uploads-backup.tar.gz -C /data .
```

## 🔧 Troubleshooting

```bash
# View WordPress logs
docker compose -f docker-compose.yml -f docker-compose.prod.yml logs -f wordpress

# Access WordPress shell
docker compose -f docker-compose.yml -f docker-compose.prod.yml exec wordpress bash

# Test database connection
docker compose -f docker-compose.yml -f docker-compose.prod.yml exec wordpress \
  wp db check --allow-root

# Restart unhealthy service
docker compose -f docker-compose.yml -f docker-compose.prod.yml restart wordpress
```

## 🌐 DNS & Traefik

```bash
# Verify DNS
dig +short ${DOMAIN}

# Check Traefik router
docker logs traefik | grep airflow-wordpress

# View Traefik dashboard (if enabled)
# https://traefik.example.com/dashboard/
```

## 📊 Resource Usage

```bash
# View container stats
docker stats wp_airflow

# View all containers
docker stats
```

## 🔐 Security Checklist

- [ ] `.env` file has strong passwords
- [ ] `.env` is in `.gitignore`
- [ ] WordPress salts are unique (https://roots.io/salts.html)
- [ ] Domain DNS is configured
- [ ] Traefik Let's Encrypt is working
- [ ] MySQL port 3312 is firewalled (or removed)
- [ ] WordPress admin password is strong
- [ ] Regular backups are scheduled

## 📁 Important Files

```
.
├── .env                          # Environment variables (DO NOT COMMIT)
├── docker-compose.yml            # Base configuration
├── docker-compose.prod.yml       # Production overrides
├── Makefile                      # Build commands
├── docker/
│   ├── wordpress/Dockerfile      # WordPress image
│   └── node/Dockerfile           # Node builder image
└── .agent/workflows/
    ├── production-deployment.md  # Full deployment guide
    └── docker-naming-strategy.md # Naming conventions
```

## 🆘 Emergency Recovery

```bash
# Stop everything
make prod-down

# Remove containers (keeps volumes)
docker compose -f docker-compose.yml -f docker-compose.prod.yml down

# Remove everything including volumes (DANGER!)
docker compose -f docker-compose.yml -f docker-compose.prod.yml down -v

# Rebuild from scratch
make prod-deploy
```

## 📞 Support

For detailed documentation, see:
- [Production Deployment Guide](.agent/workflows/production-deployment.md)
- [Docker Naming Strategy](.agent/workflows/docker-naming-strategy.md)
- [Main README](../README.md)
