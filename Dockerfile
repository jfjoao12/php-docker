FROM byjg/php:8.3-fpm-apache

COPY . /var/www/localhost/htdocs

RUN mkdir -p /opt/databases \
 && apk add sqlite \
 && sqlite3 /opt/databases/mydb.sq3 < /var/www/localhost/htdocs/create_table_sqlite.sql

