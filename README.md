<p align="center"><a href="#"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Our Modular Laravel Backend Project

Ye project ek modular Laravel backend API hai jo multiple modules par based hai jaise Companies, Vendors, Shippers, Consignees, aur Ports. Har module apni migration, models, controllers aur routes rakhta hai jisse project ko scalable aur maintainable banaya ja sake.

Humne Laravel 12, Eloquent ORM, SoftDeletes, Pagination, Validation, aur API resource controllers ka use kiya hai taake ek robust aur clean backend architecture banaya ja sake.

### Key Features:

- Modular structure for better code organization and scalability
- RESTful APIs for each module (Companies, Vendors, Shippers, etc.)
- Soft Deletes with restore and force delete options
- Pagination support in list endpoints
- Request validation for data integrity
- Eloquent relationships (e.g., Vendor hasMany Shippers)
- Laravel Query Builder for efficient DB operations

---

## Getting Started

### Requirements

- PHP 8.x
- Laravel 12.x
- MySQL or compatible database
- Composer

### Installation

```bash
git clone <your-repo-url>
cd your-project-folder
composer install
cp .env.example .env
php artisan key:generate
