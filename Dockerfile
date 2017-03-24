FROM php:5.6-apache

RUN apt-get update && apt-get install -y libmemcached-dev \
    php5-mysql

COPY . /var/www/html/

EXPOSE 80
