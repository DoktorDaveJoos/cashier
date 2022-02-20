# Cashier

## Prerequesites

* Docker installed

## Quick start
1. Clone project
2. `cd cashier`
3. `docker run --rm -v $(pwd):/opt -w /opt laravelsail/php80-composer:latest composer install`
4. `./vendor/bin/sail up`
5. `./vendor/bin/sail php artisan migrate`
6. `./vendor/bin/sail npm i`
7. `./vendor/bin/sail npm run dev`


