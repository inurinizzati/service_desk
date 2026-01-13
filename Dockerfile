# -----------------------------
# Laravel + Apache Dockerfile
# -----------------------------
FROM php:8.2-apache

# -----------------------------
# 1️⃣ Disable conflicting MPMs, enable prefork & rewrite
# -----------------------------
RUN a2dismod mpm_event \
    && a2dismod mpm_worker \
    && a2enmod mpm_prefork \
    && a2enmod rewrite

# -----------------------------
# 2️⃣ Set working directory
# -----------------------------
WORKDIR /var/www/html

# -----------------------------
# 3️⃣ Install system dependencies for Laravel
# -----------------------------
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl \
    && docker-php-ext-install pdo pdo_mysql zip

# -----------------------------
# 4️⃣ Copy composer files first for caching
# -----------------------------
COPY composer.json composer.lock ./

# -----------------------------
# 5️⃣ Install Composer
# -----------------------------
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# -----------------------------
# 6️⃣ Copy the rest of the Laravel app
# -----------------------------
COPY . .

# -----------------------------
# 7️⃣ Install Laravel dependencies
# -----------------------------
RUN composer install --no-dev --optimize-autoloader

# -----------------------------
# 8️⃣ Set permissions for storage and cache
# -----------------------------
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# -----------------------------
# 9️⃣ Expose port 80
# -----------------------------
EXPOSE 80

# -----------------------------
# 10️⃣ Run Apache in foreground
# -----------------------------
CMD ["apache2-foreground"]
