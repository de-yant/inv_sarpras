# School Infrastructure Inventory System - Laravel 10.10

Inventory System, This application was created to simplify the internal infrastructure section
List items owned by the school such as computers, tables, chairs, etc. This application is also submitted as a final project application or project (SKRIPSI - 2023).

## Table of Contents

- [How to Install](#how-to-install)
  - [Clone Repository](#clone-repository)
  - [Install Packages](#install-packages)
  - [Configure](#configure)
  - [Migrate Data](#migrate-data)
  - [Public Disk](#public-disk)
  - [Running Application](#running-application)
- [Account](#account)
- [Screenshots](#screenshots)
  - [Login](#login)
  - [Dashboard](#dashboard)
  - [Sumber Barang](#sumber-barang)
  - [Data Ruangan](#data-ruangan)
  - [Data Barang](#data-barang)
- [License](#license)

## How to Install

### Clone Repository
open your terminal, go to the directory that you will install this project, then run the following command:

```bash
git clone https://github.com/de-yant/sistem-inventarisasi-sarana-prasarana.git

cd sistem-inventarisasi-sarana-prasarana 
```

### Install Packages
Install vendor using composer

```bash
composer update
```

Install node module using npm

```bash
npm install
```

### Configure
Copy .env.example file

```bash
cp .env.example .env
```

Then run the following command :

```php
php artisan key:generate
```

### Migrate Data
create an empty database with mysql 8.x version, then setup that fresh db at your .env file, then run the following command to generate all tables and seeding dummy data:

```php
php artisan migrate:fresh --seed
```
### Public Disk
To make these files accessible from the web, you should create a symbolic link from public/storage to storage/app/public.
To create the symbolic link, you may use the storage:link Artisan command:

```php
php artisan storage:link
```

### Running Application
To serve the laravel app, you need to run the following command in the project director (This will serve your app, and give you an adress with port number 8000 or etc)
- **Note: You need run the following command into new terminal tab**

```php
php artisan serve
```

Visit
```bash 
[http://127.0.0.1:8000]
```

## Account
  | admin@mail.com   | password |

## Screenshots

### Login

![Login](https://github.com/de-yant/sistem-inventarisasi-sarana-prasarana/blob/main/public/assets/img/login.png?raw=true)

### Dashboard

![Dashboard](https://github.com/de-yant/sistem-inventarisasi-sarana-prasarana/blob/main/public/assets/img/dashboard.png?raw=true)

### Sumber Barang

![Sumber Barang](https://github.com/de-yant/sistem-inventarisasi-sarana-prasarana/blob/main/public/assets/img/sumber-dana.png?raw=true)

### Data Ruangan

![Data Ruangan](https://github.com/de-yant/sistem-inventarisasi-sarana-prasarana/blob/main/public/assets/img/data-ruangan.png?raw=true)

### Data Barang

![Data Barang](https://github.com/de-yant/sistem-inventarisasi-sarana-prasarana/blob/main/public/assets/img/data-barang.png?raw=true)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
