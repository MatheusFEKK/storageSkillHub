FROM php:8.2-apache

COPY . .

WORKDIR /

RUN a2enmod rewrite