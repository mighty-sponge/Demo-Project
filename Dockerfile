FROM php:7.4-apache

RUN apt-get update && apt-get upgrade -y && apt-get autoremove -y
RUN docker-php-ext-install mysqli
# EXPOSE 80