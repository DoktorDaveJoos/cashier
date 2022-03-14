# Cashier

A cashless payment software solution

### Prerequesites
* Docker installed

### Quick start
1. Clone project
2. `$ cd cashier`
4. `$ docker run --rm \
   -u "$(id -u):$(id -g)" \
   -v $(pwd):/var/www/html \
   -w /var/www/html \
   laravelsail/php80-composer:latest \
   composer install --ignore-platform-reqs`
5. `$ cp .env.example .env`
6. Open `.env` and make it fit your needs. Example:
```dotenv
APP_NAME=Cashier
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://cashier.test

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=cashier
DB_USERNAME=root
DB_PASSWORD=

[...]
```
6. `$ sail up -d`
7. `$ sail php artisan key:generate`
8. `$ sail php artisan migrate`
9. `$ sail npm i`

### Seeding the database

`$ sail php artisan db:seed`

### Run project
1. `$ sail npm run dev`
2. Open browser and navigate to `localhost`








