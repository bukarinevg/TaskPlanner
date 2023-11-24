FROM php:8.1-fpm
COPY ./src /app
WORKDIR /app
CMD ["php-fpm"]