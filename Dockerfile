FROM webdevops/php-nginx:7.2

RUN apt-install libpq-dev
RUN docker-php-ext-install opcache pdo pdo_pgsql pgsql

ENV APPNAME "SLIM"

COPY config/site.conf /opt/docker/etc/nginx/conf.d/site.conf
ADD . /app

RUN chmod -R 777 /app/public/

EXPOSE 91
