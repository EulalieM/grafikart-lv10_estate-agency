FROM php:8.2-cli

RUN apt-get update && \
    apt-get install -y zlib1g-dev libzip-dev unzip && \
    docker-php-ext-install zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

COPY . /usr/src/app

WORKDIR /usr/src/app

CMD php artisan serve --host=0.0.0.0 --port=8000
