# =============================================================================
# Stage 1: Builder (for production asset compilation)
# =============================================================================
FROM node:20-alpine AS builder

WORKDIR /app

# Install dependencies first for better caching
COPY bedrock/web/app/themes/sage/package*.json ./

RUN npm ci

# Copy theme source
COPY bedrock/web/app/themes/sage .

# Build production assets
RUN npm run build

# =============================================================================
# Stage 2: Development (for local development with Vite HMR)
# =============================================================================
FROM node:20-alpine AS development

WORKDIR /app

# Install dependencies first for better caching
COPY bedrock/web/app/themes/sage/package*.json ./

RUN npm ci

# Copy theme source
COPY bedrock/web/app/themes/sage .

EXPOSE 5173

CMD ["npm", "run", "dev", "--", "--host", "0.0.0.0"]

