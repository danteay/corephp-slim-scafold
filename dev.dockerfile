FROM php:7.3

RUN apt-get update && apt-get install -y mysql-client libmagickwand-dev libpq-dev --no-install-recommends
RUN pecl install imagick
RUN docker-php-ext-enable imagick
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install pgsql pdo_pgsql
