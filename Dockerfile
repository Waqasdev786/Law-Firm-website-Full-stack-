# Stage 1: Node.js build stage — compile Tailwind CSS via Vite
FROM node:18-alpine AS node-builder

WORKDIR /app

COPY package.json package-lock.json* ./
RUN npm install

COPY . .
RUN npm run build

# Stage 2: PHP runtime stage
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev zip nginx \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Copy compiled assets from the Node build stage
COPY --from=node-builder /app/public/build ./public/build

RUN composer install --no-dev --optimize-autoloader

# Set up .env with production values
RUN cp .env.example .env \
    && sed -i 's/APP_ENV=local/APP_ENV=production/' .env \
    && sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' .env \
    && php artisan key:generate --force

# Run database migrations and cache all config for production
RUN php artisan migrate --force \
    && php artisan config:clear \
    && php artisan config:cache \
    && php artisan route:clear \
    && php artisan route:cache \
    && php artisan view:clear \
    && php artisan view:cache \
    && php artisan cache:clear

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

COPY nginx.conf /etc/nginx/sites-enabled/default

EXPOSE 8080

CMD service nginx start && php-fpm