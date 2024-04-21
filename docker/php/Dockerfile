FROM php:8.1-fpm

COPY php.ini /usr/local/etc/php/

# # 最新のnpmパッケージをインストール
# RUN apt update && apt install -y npm\
#   # nodeのバージョン管理ツール「n」をnpmでインストール
#     && npm install -g n \
#   #バージョンを指定してnode.jsをインストール
#     && n 12 \
# # gRPC for PHP のインストール
#   # PECL のインストール
#     && apt install  autoconf zlib1g-dev php-dev php-pear \
#   # Composer のインストール
#     && curl -sS https://getcomposer.org/installer | php \
#     && mv composer.phar /usr/local/bin/composer \
#   # Composer自体を最新にアップデート
#     && composer self-update \
#   # gRPC 拡張機能のインストール
#     && pecl install grpc \
#   # gRPC を Composer 依存関係として追加する
#     && composer require "grpc/grpc:^1.38" \
#   # protobuf ランタイム ライブラリをインストールする
#     && composer require "google/protobuf:^3.17" \
#   # aptキャッシュをクリーンにし、/var/lib/apt/listsを削除することで、イメージのサイズを減らす
#     && apt-get clean \
#     && rm -rf /var/lib/apt/lists/* \
#   # Laravelをインストール
#     && composer global require "laravel/installer"

# # 操作するディレクトリの絶対パスを指定
# WORKDIR /var/www/html







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

RUN composer global require "laravel/installer"

RUN composer self-update --2

RUN apt-get update && apt-get -y install git autoconf zlib1g-dev libicu-dev libonig-dev libzip-dev unzip &&\
    apt-get clean && \
    #gRPC本体をインストール
    pecl install grpc && \
    pecl install protobuf && \
    rm -rf /var/lib/apt/lists/* &&\
    docker-php-ext-install pdo_mysql &&\
    composer config -g process-timeout 3600 && \
    mkdir -p /app