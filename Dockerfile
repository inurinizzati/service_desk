# Use official PHP image with Apache
FROM php:8.2-apache

# Disable other MPM modules
RUN a2dismod mpm_event \
    && a2enmod mpm_prefork \
    && a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy composer files
COPY composer.json composer.lock ./

# Install dependencies
RUN apt-get update && apt-get install -y libzip-dev unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Copy Laravel app
COPY . .

# Set permissions (if needed)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 80

# Run Apache in foreground
CMD ["apache2-foreground"]
