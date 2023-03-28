FROM php:7.4-apache
RUN a2enmod headers && service apache2 restart