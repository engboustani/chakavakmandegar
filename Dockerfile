FROM php:7.3-fpm
RUN apt-get update && apt-get install -y \
    build-essential \
    mariadb-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl
RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl
RUN apt-get update && apt-get install -y libmcrypt-dev \
    && pecl install mcrypt-1.0.2 \
    && docker-php-ext-enable mcrypt
RUN docker-php-ext-install pdo mbstring
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd
ARG CACHEBUST=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
COPY ./app /app/app
COPY ./bootstrap /app/bootstrap
COPY ./config /app/config
COPY ./database /app/database
COPY ./public /app/public
COPY ./resources /app/resources
COPY ./routes /app/routes
COPY ./storage /app/storage
COPY ./tests /app/tests
COPY ./.env /app/.env
COPY ./artisan /app/artisan
COPY ./composer.json /app/composer.json
COPY ./phpunit.xml /app/phpunit.xml
COPY ./server.php /app/server.php

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000