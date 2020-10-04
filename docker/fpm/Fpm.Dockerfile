FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zlib1g-dev \
    libonig-dev \
    zip \
    libpq-dev \
    && docker-php-ext-install zip pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_MEMORY_LIMIT=-1

WORKDIR /var/www/app
