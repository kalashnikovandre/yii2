FROM php:8.2-fpm-alpine

# Устанавливаем зависимости
RUN apk add --no-cache \
        autoconf \
        g++ \
        imagemagick \
        imagemagick-dev \
        libtool \
        libgomp \
        make \
        pcre-dev \
        postgresql-dev \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql \
    && apk del g++ imagemagick-dev libtool make pcre-dev

# Устанавливаем дополнительные инструменты
RUN apk add --no-cache \
        nano \
        bash \
 && apk update

#composer install
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php \
 && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \

WORKDIR /app
