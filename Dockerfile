# Use PHP with Apache
FROM php:8.2-apache

# Disable conflicting MPM modules and enable required ones
RUN a2dismod mpm_event \
    && a2dismod mpm_worker \
    && a2enmod mpm_prefork \
    && a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Install system dependencies for Laravel
RUN apt-get update && apt-get install -y libzip-dev unzip git \
    && docker-php-ext-install pdo pdo_mysql zip

# Copy composer files
COPY composer.json composer.lock ./

# Install Composer dependencies
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader \
    && rm composer-setup.php

# Copy Laravel app
COPY . .

# Set permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Run Apache in foreground
CMD ["apache2-foreground"]
