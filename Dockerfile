FROM php:8.0-apache
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
RUN apt-get update && apt-get upgrade -y