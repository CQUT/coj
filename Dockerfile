FROM php:5.6-apache

RUN apt-get update && apt-get install -y libmemcached-dev

COPY . /var/www/html/

EXPOSE 80
