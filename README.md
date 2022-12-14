# Products Rest Api

## Requirements

PHP 8.0

Laravel 9.34.0

MySQL Database

## Installation

Copy repository

```bash

git clone https://github.com/mironiukzb/products.git

or

git clone git@github.com:mironiukzb/products.git

```

In your database client create database 'products'

```sql
CREATE DATABASE products
```

Create in project's root directory file .env, and copy all contents from .env.example file to them

In .evn file, set your database connection 

```bash

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=products
DB_USERNAME=root
DB_PASSWORD=

```

Create tables in database by migrations

```bash

php artisan migrate

```

Create user account for basic auth (login:user123@example.com password: password123)

```bash
php artisan create:user
```

## Endpoints

Without auth:

/api/products (GET)

With basic auth:

/api/product (POST)

/api/list   (GET)

/api/update/{product} (PATCH)

/api/{product}   (DELETE)
