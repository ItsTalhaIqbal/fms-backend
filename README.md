# FMS-BACKEND

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

## About Our Modular Laravel Backend Project

Ye project ek modular Laravel backend API hai jo [`nwidart/laravel-modules`](https://github.com/nWidart/laravel-modules) package ka use karta hai taake scalability aur maintainability ensure ki ja sake. Isme multiple modules hain jaise Companies, Vendors, Shippers, Consignees, aur Ports, aur har module ke apne migrations, models, controllers, aur routes hain.

Humne Laravel 12, Eloquent ORM, SoftDeletes, Pagination, Validation, aur API resource controllers ka istemal kiya hai taake ek robust aur clean backend architecture banaya ja sake.

### Key Features:

- Modular structure `nwidart/laravel-modules` ke sath for better code organization and scalability
- RESTful APIs for each module (Companies, Vendors, Shippers, Consignees, Ports, etc.)
- Soft Deletes with restore and force delete options
- Pagination support in list endpoints
- Request validation for data integrity
- Eloquent relationships (e.g., Vendor hasMany Shippers)
- Laravel Query Builder for efficient DB operations
- Optional API authentication (Laravel Sanctum ya Passport ke sath)

## Getting Started

### Requirements

- PHP >= 8.2
- Laravel 12.x
- MySQL ya compatible database (e.g., PostgreSQL, SQLite)
- Composer
- Node.js aur NPM (optional, agar frontend assets use ho rahe hain)
- Git

### Installation

```bash
git clone https://github.com/techesprit/fms-backend
cd fms-backend
composer install
cp .env.example .env
php artisan key:generate
