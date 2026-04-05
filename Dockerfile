# syntax=docker/dockerfile:1

FROM php:8.2-fpm-alpine AS php-base

# Install system dependencies and PHP extensions required by Laravel
RUN apk add --no-cache \
        bash \
        curl \
        git \
        icu-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev \
        libzip-dev \
        zlib-dev \
        oniguruma-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
    && rm -rf /var/cache/apk/*

WORKDIR /var/www/html

# Composer dependencies
FROM composer:2.7 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-progress --prefer-dist --optimize-autoloader --no-scripts

# Frontend build (Laravel Mix)
FROM node:18-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json* ./
RUN npm install
COPY webpack.mix.js ./
COPY resources ./resources
RUN npm run production

# Final image
FROM php-base AS app
WORKDIR /var/www/html

# Copy application code
COPY . .

# Bring in compiled dependencies and assets
COPY --from=vendor /app/vendor ./vendor
COPY --from=assets /app/public ./public

# Ensure writable directories for Laravel
RUN addgroup -g 1000 laravel && adduser -G laravel -u 1000 -D laravel \
    && chown -R laravel:laravel storage bootstrap/cache

USER laravel
EXPOSE 8080

# Run Laravel via PHP built-in server (Render expects an HTTP listener on $PORT)
ENV PORT=8080
CMD ["sh", "-c", "php -d variables_order=EGPCS -S 0.0.0.0:${PORT} server.php"]
