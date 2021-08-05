FROM php:8.0-apache

RUN apt update

RUN apt install -y librdkafka-dev \
  && apt install build-essential \
  && apt install -y libpq-dev \
  && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini \
  && pecl install rdkafka \
  && echo "extension=rdkafka.so" >> /usr/local/etc/php/php.ini

RUN docker-php-ext-install pdo_pgsql exif pcntl

ENTRYPOINT ["php", "/var/www/html/src/main/server.php"]