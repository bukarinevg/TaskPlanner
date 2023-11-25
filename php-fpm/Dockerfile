# Use an official PHP runtime with FPM as a base image
FROM php:8.1-fpm

# Set working directory
WORKDIR /app

# Install Composer globally
RUN apt-get update && apt-get install -y git zip \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Copy the PHP application files into the container
# COPY ./src /var/www/html

# Install additional PHP extensions if needed
RUN docker-php-ext-install mysqli pdo_mysql

# Expose port 9000 (PHP-FPM default)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
