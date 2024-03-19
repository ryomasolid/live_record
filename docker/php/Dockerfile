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
# RUN curl -sS https://getcomposer.org/installer \
#   | php \
#   && mv composer.phar /usr/bin/composer \
#   && composer config -g repos.packagist composer https://packagist.jp \
#   && composer global require hirak/prestissimo \
#   && chown www-data:www-data /var/www \
#   && mkdir -p ${APACHE_DOCUMENT_ROOT}/var \
#   && chown -R www-data:www-data ${APACHE_DOCUMENT_ROOT} \
#   && find ${APACHE_DOCUMENT_ROOT} -type d -print0 \
#   | xargs -0 chmod g+s \
#   ;

WORKDIR /var/www/html

# php-fpmはデフォルトのユーザwww-dataで動く。https://stackoverflow.com/questions/48619445/permission-denied-error-using-laravel-docker
# 変更する場合は /usr/local/etc/php-fpm.d/www.conf でユーザー名を変える。
RUN chown -R www-data:www-data /var/www/html

RUN composer global require "laravel/installer"

RUN composer self-update --2
