FROM webdevops/php-nginx:7.3

###################################################################
# Installing dependencies
###################################################################

ENV SRC /app
ENV PORT 8080

RUN apt-get update && apt-get install -y mysql-client libmagickwand-dev libpq-dev --no-install-recommends
RUN pecl install imagick
RUN docker-php-ext-enable imagick
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install pgsql pdo_pgsql

###################################################################
# Environment variables of the proyect
###################################################################

ENV APPNAME "slim-scafold"
ENV ERROR_DETAILS "true"

###################################################################
# Configuring Nginx
###################################################################

COPY config/site.conf /opt/docker/etc/nginx/conf.d/site.conf

###################################################################
# Add aplication files
###################################################################

ADD . ${SRC}

WORKDIR ${SRC}
RUN composer install

RUN chmod -R 777 ${SRC}/public/
RUN chmod -R 777 ${SRC}

EXPOSE ${PORT}
