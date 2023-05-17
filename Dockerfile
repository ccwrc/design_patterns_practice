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
RUN pecl install xdebug && docker-php-ext-enable xdebug

# https://blog.codito.dev/2022/11/composer-binary-only-docker-images/
COPY --from=composer/composer:2.5.5-bin /composer /usr/bin/composer
RUN composer install --no-interaction --no-progress
