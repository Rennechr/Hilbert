FROM php:alpine

RUN apk add --no-cache $PHPIZE_DEPS && \
      	docker-php-ext-install pdo_mysql

VOLUME /hilbert
