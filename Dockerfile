FROM danteay/php7-pgsql

ENV APPNAME "SLIM_SCAFOLD"

WORKDIR /var/www

ADD . /var/www

EXPOSE 8080

VOLUME [ ".:/var/www" ]

CMD [ "php", "-S", "0.0.0.0:8080", "-t", "public", "index.php" ]