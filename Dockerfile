FROM dimonpvt/php5.5.9

RUN apt-get update && apt-get install -y php5-memcache

COPY . /var/www/

EXPOSE 80
