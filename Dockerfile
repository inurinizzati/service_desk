# Use the official PHP image as the base image
FROM php:7.4-apache

# Copy the application files into the container
COPY . /var/www/html

# Set the working directory in the container
WORKDIR /var/www/html

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-install \
    intl \
    zip \
    && a2enmod rewrite
    
# Set Apache to serve Laravel public folder
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

# Define the entry point for the container
CMD ["apache2-foreground"]
