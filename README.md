# Blog
A project to learn laravel framework. It is to provide functions to help manage blogs.

## Install
### Clone code from github
Download zip file or
```bash
git clone https://github.com/duongtruong175/blog.git
```
### Init project
```bash
composer install
```
copy file .env.example to .env

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
run:
```bash
- php artisan serve
```
## Usage
- User interface: http://localhost:8000/
- Admin interface: http://localhost:8000/admin (admin@gmail.com / 12345678)