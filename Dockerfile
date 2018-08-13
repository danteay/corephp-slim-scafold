FROM webdevops/php-nginx:7.2

RUN apt-install libpq-dev
RUN docker-php-ext-install opcache pdo pdo_pgsql pgsql

ENV APPNAME "SLIM"
ENV ERROR_DETAILS "true"

# Replace this value with a valid URL of your database
ENV DATABASE_URL postgres://localhost:5432/postgres

COPY config/site.conf /opt/docker/etc/nginx/conf.d/site.conf
ADD . /app

RUN chmod -R 777 /app/public/

# If you want to change this port, don't forget change the reference in the config/site.conf file to
EXPOSE 91
