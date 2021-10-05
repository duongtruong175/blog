# Blog

A project to learn laravel framework. It is to provide functions to help manage blogs.

## Install

### Clone code from github

Download zip file or

```bash
git clone https://github.com/duongtruong175/blog.git
```

### Init project

#### Composer

```bash
composer install
```

copy file .env.example to .env (Ex: Windows)

```bash
copy .env.example .env
```

#### Nodejs

install nodejs

```bash
npm install
```

```bash
npm run dev
```

### Mysql connection

Create database and edit config database connection in .env file

### Run Project

create tables:

```bash
php artisan migrate
```

create a admin account:

```bash
php artisan db:seed
```

generating a new application key:

```bash
php artisan key:generate
```

create the symbolic link to storage/app/public:

```bash
php artisan storage:link
```

run:

```bash
php artisan serve
```

## Usage

-   User interface: http://localhost:8000/
-   Admin interface: http://localhost:8000/admin (admin@gmail.com / 12345678)
