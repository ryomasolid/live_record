FROM php:8.1-fpm

COPY php.ini /usr/local/etc/php/

RUN apt update
RUN apt install -y wget git unzip libpq-dev

# Install Node.js 12
RUN apt install -y npm \
  && npm install n -g \
  && n 12

# Install PHP Extensions
RUN apt install -y zlib1g-dev mariadb-client libzip-dev libonig-dev \
  && docker-php-ext-install zip pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

RUN apt-get update && apt-get -y install git autoconf zlib1g-dev libicu-dev libonig-dev libzip-dev unzip
RUN apt-get clean

#gRPC本体をインストール
RUN pecl install grpc && \
pecl install protobuf