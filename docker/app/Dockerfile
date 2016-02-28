FROM php:5.6-fpm

RUN docker-php-ext-install mysql

RUN chown -R www-data:www-data /var/www/html

ENTRYPOINT ["php-fpm", "-F"]
