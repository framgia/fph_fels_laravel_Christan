# E-Learning Project

This is a training project output

## Installation

Clone the application to a local repository

```
git clone git@github.com:framgia/fph_fels_laravel_christan.git elearning
```
Then
```
cd elearning
```
This requires [npm](https://www.npmjs.com/get-npm), so open bash and run

```
npm install
```

Wait for the installation to finish.

## Environment Setup
After the installation, you need to setup the `.env`, but environment files are included in the `.gitignore` file so you need to create your own `.env` file. To do this, simply run

```
cp .env-example .env
```

Then in the `.env` file, modify it to this.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eLearning
DB_USERNAME=root
DB_PASSWORD=

```

This means that the laravel application would access a database named `eLearning` with the username `root` and the `password`, so you can open
`phpmyadmin` and create the database.

## Migrate

Once the database is created, run `php artisan migrate`

## Serve
After that, you're set! Just run
```
php artisan db:seed
php artisan serve
```

and go to `http://localhost:8000`
