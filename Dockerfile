FROM php:8.2-apache

COPY composer.lock composer.json /var/www/html/

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

#update apt in ubuntu or linux
#RUN apt-get update && apt-get upgrade -y

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
