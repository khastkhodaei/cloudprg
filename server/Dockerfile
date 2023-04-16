FROM php:8.0-apache

RUN apt update
RUN apt upgrade
RUN apt-get update && apt-get install -y --no-install-recommends \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    unzip


RUN pecl install mongodb
RUN docker-php-ext-enable mongodb.so
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require --working-dir=/var/www servervol/servervol

EXPOSE 80