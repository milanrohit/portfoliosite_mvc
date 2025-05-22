# Use the official PHP 8.2 Apache image
FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html

# Set permissions for storage and public/assets
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/public/assets

# Expose port 80
EXPOSE 80

# Copy custom vhost config for clean URLs
COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf 