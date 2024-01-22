FROM php:8.2.0-fpm-alpine

RUN apk add --update linux-headers

RUN apk add --update linux-headers --no-cache autoconf g++ make


RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql pgsql




# Use the default production configuration / rename

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

##COPY ./docker/php-configuration /usr/local/etc/php




RUN addgroup -g 1000 app && adduser -u 1000 -G app -s /bin/sh -D app
WORKDIR /app
USER app


