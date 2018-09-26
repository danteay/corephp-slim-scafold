FROM webdevops/php-nginx:7.2

###################################################################
# Installing dependencies
###################################################################

ENV SRC /app
ENV PORT 8080

RUN apt-install libpq-dev
RUN docker-php-ext-install opcache pdo pdo_pgsql pgsql

###################################################################
# Environment variables of the proyect
###################################################################

ENV APPNAME "slim-scafold"
ENV ERROR_DETAILS "true"

# A valid URL format of your database
#
# ENV DATABASE_URL postgres://localhost:5432/postgres

# Change for a valid Redis URL
#
# ENV REDIS_URL redis://pass@host:port/index

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
