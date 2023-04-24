FROM php:8.2.5

WORKDIR /usr/src/app
COPY . .
COPY .env.dist .env

RUN echo 'memory_limit = 1024M' >> /usr/local/etc/php/php.ini;

RUN apt-get update -y && apt-get install -y \
    zip \
    unzip \
    vim
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY --from=composer:2.5.5 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN set -eux
RUN composer install --no-interaction --no-progress
