FROM php:8.2-cli

COPY . /usr/src/app

WORKDIR /usr/src/app

CMD php artisan serve --host=0.0.0.0 --port=8000
