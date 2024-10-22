<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Application

This application is a web-based platform with a built-in Content Management System (CMS), developed using **Laravel 11**, **PHP 8.2**, and **MariaDB**. It provides a user-friendly interface for managing content efficiently and effectively.

## Features

-   User-friendly CMS for easy content management
-   Built with the latest technologies for optimal performance
-   Responsive design for accessibility on various devices

## Installation Guide

Follow these steps to install the application:

1. **Clone the repository:** `bash
git clone https://github.com/ekasatriaap/website-m2m-pku.git
cd your-repo-directory   `

2. **Install dependencies:**
   Make sure you have Composer installed, then run: `bash
composer install   `

3. **Set up the environment file:**
   Copy the `.env.example` file to `.env`: `bash
cp .env.example .env   `

4. **Generate the application key:** `bash
php artisan key:generate   `

5. **Configure your database:**
   Update the `.env` file with your database credentials: `env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password   `

6. **Run migrations:** `bash
php artisan migrate --seed   `

7. **Create symlink for storage:** `bash
php artisan storage:link   `

8. **Start the development server:** `bash
php artisan serve   `

9. **Access the application:**
   Open your browser and go to `http://localhost:8000`.

## Authors

-   **Eka S Ariaputra**
-   **Erik Setiawan**

## License

This application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
