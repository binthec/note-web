FROM php:7.4-fpm-buster

RUN apt-get update
RUN apt-get install -y apt-utils
RUN apt-get install -y git
RUN apt-get install -y zlib1g-dev
RUN apt-get install -y mcrypt
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y libjson-c-dev
RUN apt-get install -y libxml2-dev
RUN apt-get install -y libssl-dev
RUN apt-get install -y libpq-dev
RUN apt-get install -y libspatialindex-dev

RUN apt-get install -y libonig-dev
RUN docker-php-ext-install mbstring
RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install json
RUN docker-php-ext-install pcntl

RUN apt-get install -y libfreetype6-dev
RUN apt-get install -y libjpeg62-turbo-dev
RUN docker-php-ext-install gd
RUN docker-php-ext-install opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#デフォルトで nodejs を入れないと npm が入らないので、
#２回に分けて nodejs の最新を入れる
RUN apt-get install -y nodejs
RUN apt-get install -y npm

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g