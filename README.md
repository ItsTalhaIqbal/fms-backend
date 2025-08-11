# FMS-BACKEND

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

## About Our Modular Laravel Backend Project

This project is a modular Laravel backend API utilizing the [`nwidart/laravel-modules`](https://github.com/nWidart/laravel-modules) package to ensure scalability and maintainability. It consists of multiple modules such as Companies, Vendors, Shippers, Consignees, and Ports, each containing their own migrations, models, controllers, and routes.

We have used Laravel 12, Eloquent ORM, SoftDeletes, Pagination, Validation, and API resource controllers to create a robust and clean backend architecture.

### Key Features

- Modular structure using `nwidart/laravel-modules` for better code organization and scalability
- RESTful APIs for each module (Companies, Vendors, Shippers, Consignees, Ports, etc.)
- Soft Deletes with restore and force delete options
- Pagination support on list endpoints
- Request validation for data integrity
- Eloquent relationships (e.g., Vendor hasMany Shippers)
- Laravel Query Builder for efficient database operations
- Optional API authentication using Laravel Sanctum or Passport

## Getting Started

### Requirements

- PHP >= 8.2
- Laravel 12.x
- MySQL or compatible database (e.g., PostgreSQL, SQLite)
- Composer
- Node.js and NPM (optional, if frontend assets are used)
- Git

### Installation

Clone the repository using:

git clone https://github.com/techesprit/fms-backend

Change directory to the project folder:

cd fms-backend

Install PHP dependencies:

composer install

Copy the example environment file:

cp .env.example .env

Generate the application key:

php artisan key:generate

Configure your database credentials and other settings in the `.env` file.

Run the database migrations:

php artisan migrate

(Optional) If you are using frontend assets, install Node.js dependencies:

npm install

npm run dev

Start the development server:

php artisan serve

## Packages Used

The following Composer packages are used in this project:

- `nwidart/laravel-modules`: For modular structure
- `laravel/framework`: Core Laravel framework (v12.x)
- `laravel/sanctum` (optional): For API authentication
- `laravel/tinker`: Interactive REPL for Laravel
- `spatie/laravel-permission` (optional): Role-based access control
- `barryvdh/laravel-debugbar` (dev): Debugging and profiling
- `fakerphp/faker`: Fake data generation for testing
- `phpunit/phpunit`: Unit and feature testing

Additional packages may be added based on module-specific requirements.

## Project Structure

This project follows a modular structure with `nwidart/laravel-modules`. Each module (e.g., Companies, Vendors) resides in the `Modules/` directory and contains:

- `Config/`: Module-specific configuration files
- `Database/Migrations/`: Database migration files
- `Models/`: Eloquent models
- `Http/Controllers/`: API resource controllers
- `Routes/`: API route definitions
- `Resources/`: API resources and collections

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes. Ensure your code follows PSR-12 coding standards and includes appropriate tests.

## License

This project is open-source and licensed under the MIT License.

---

© 2025 techesprit
