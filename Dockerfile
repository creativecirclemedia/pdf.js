FROM php:8.3.36-apache
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN apt-get update \
 && apt-get install -y --no-install-recommends unzip \
 && rm -rf /var/lib/apt/lists/* \
 && a2enmod headers \
 && cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
ENV COMPOSER_HOME=/tmp/composer
WORKDIR /srv/pdf.js
