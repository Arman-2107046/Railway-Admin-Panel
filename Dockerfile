# Base image
FROM dunglas/frankenphp:php8.2.29-bookworm

# Set working directory
WORKDIR /app

# Install required PHP extensions
RUN install-php-extensions intl zip pdo_mysql mbstring curl xml

# Copy composer files first (for caching)
COPY composer.json composer.lock /app/

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy the rest of the project
COPY . /app

# Generate app key and cache configs (optional if env variables are set in Railway)
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose dynamic port for Railway
ENV PORT $PORT
EXPOSE $PORT

# Start the Laravel server
CMD php artisan serve --host=0.0.0.0 --port=$PORT
