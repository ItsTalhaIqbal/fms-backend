# FMS-BACKEND

## Repository files navigation

<p align="center"><a href="https://laravel.com"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Our Modular Laravel Backend Project

Ye project ek modular Laravel backend API hai jo `nwidart/laravel-modules` package ka use karta hai taake scalability aur maintainability ensure ki ja sake. Isme multiple modules hain jaise Companies, Vendors, Shippers, Consignees, aur Ports, aur har module ke apne migrations, models, controllers, aur routes hain.

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


.env file mein database credentials aur doosre settings configure karein.
Database migrations run karein:php artisan migrate


(Optional) Agar frontend assets use kar rahe hain, to Node.js dependencies install karein:npm install
npm run dev


Development server start karein:php artisan serve



Packages Used
Ye Composer packages is project mein use kiye gaye hain:

nwidart/laravel-modules: Modular structure ke liye
laravel/framework: Core Laravel framework (v12.x)
laravel/sanctum (optional): API authentication ke liye
laravel/tinker: Interactive REPL ke liye
spatie/laravel-permission (optional): Role-based access control ke liye
barryvdh/laravel-debugbar (dev): Debugging aur profiling ke liye
fakerphp/faker: Testing ke liye fake data generation
phpunit/phpunit: Unit aur feature testing ke liye

Aur bhi packages module-specific requirements ke hisaab se add kiye ja sakte hain.
Project Structure
Project nwidart/laravel-modules ke sath modular structure follow karta hai. Har module (e.g., Companies, Vendors) Modules/ directory mein hota hai aur isme shamil hai:

Config/: Module-specific configuration
Database/Migrations/: Database migrations
Models/: Eloquent models
Http/Controllers/: API resource controllers
Routes/: API routes
Resources/: API resources aur collections

Contributing
Contributions ka swagat hai! Repository ko fork karein aur apne changes ke sath pull request create karein. Ensure karein ke code PSR-12 coding standard follow karta hai aur usme appropriate tests shamil hain.
License
Ye project open-source hai aur MIT License ke under licensed hai.
Footer
© 2025 techesprit```
