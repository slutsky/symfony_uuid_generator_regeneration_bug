FROM php:8.2-fpm-alpine3.20

COPY --from=composer:2.7.7 /usr/bin/composer /usr/bin/composer
COPY --from=gordalina/cachetool:9.1.0 /usr/local/bin/cachetool /usr/bin/cachetool

RUN apk add --no-cache --virtual .build-deps \
        linux-headers \
        util-linux-dev \
        icu-dev \
        libpq-dev \
        libzip-dev \
        ${PHPIZE_DEPS} \
    && apk add --no-cache libuuid \
    && pecl install xdebug-3.3.2 \
    && echo 'autodetect' | pecl install uuid-1.2.0 \
    && echo 'yes' | pecl install apcu-5.1.23 \
    && docker-php-ext-install intl pdo_pgsql pgsql zip \
    && docker-php-ext-enable uuid xdebug apcu \
    && pecl clear-cache \
    && apk del .build-deps \
    && apk add --no-cache icu libpq libzip unzip zip \
    && {\
        echo zend_extension=opcache.so;\
        echo opcache.enable=1;\
        echo opcache.enable_cli=1;\
        echo opcache.preload=/var/www/html/config/preload.php;\
        echo opcache.preload_user=www-data;\
        echo opcache.memory_consumption=256;\
        echo opcache.max_accelerated_files=20000;\
        echo opcache.validate_timestamps=1;\
    } > ${PHP_INI_DIR}/conf.d/docker-php-ext-opcache.ini

WORKDIR /var/www/html
