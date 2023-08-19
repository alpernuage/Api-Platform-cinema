FROM php:8.2-fpm-alpine

RUN apk update && apk add postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql

# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER=1
