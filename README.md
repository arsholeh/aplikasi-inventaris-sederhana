# Laravel Inventory Application

This is a simple Inventory Application with multiple user support.

This is built on Laravel Framework 11. This was built for demonstrate purpose.

## Installation

Clone the repository-

```
git clone https://github.com/arsholeh/aplikasi-inventaris-sederhana.git
```

Then cd into the folder with this command-

```
cd aplikasi-inventaris-sederhana
```

Then do a composer install

```
composer install
```

Then create a environment file using this command-

```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server.

Then create a database named `database.sqlite` in folder `database` and then do a database migration using this command-

```
php artisan migrate:refresh --seed
```

Then change permission of storage folder using thins command-

```
(sudo) chmod 777 -R storage
```

At last generate application key, which will be used for password hashing, session and cookie encryption etc.

```
php artisan key:generate
```

## Run server

Run server using this command-

```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.
