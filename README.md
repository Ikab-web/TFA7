# IT0049 TFA6 — Laravel POS with Eloquent

A Laravel POS sample with Home, About, Customer Accounts, and User Accounts pages. Customer and user records are stored in MySQL or SQLite, loaded through Eloquent models, and displayed with Blade views.

## Requirements

- PHP 8.2 or later with Laravel's required extensions
- Composer
- SQLite or MySQL

## Install and run

From the `TFA6` project directory:

```sh
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Open `http://127.0.0.1:8000`. The supplied `.env.example` uses SQLite; change the `DB_*` values there if you want to use MySQL.

## Pages

- `/` — POS home
- `/about` — project details
- `/customers` — customer records from the `Customer` Eloquent model
- `/users` — user records from the `User` Eloquent model

## Database files

- `database/migrations/2026_11_22_000001_create_customers_and_users_tables.php` creates `customers` (`full_name`, `email`, `phone`) and `users` (`username` unique, `full_name`).
- `database/seeders/DatabaseSeeder.php` inserts five sample customers and five sample users. `updateOrCreate` makes rerunning the seeder safe.
- `app/Models/Customer.php` and `app/Models/User.php` are the Eloquent models.
- `app/Http/Controllers/CustomerController.php` and `UserController.php` query those models and pass their results to Blade views.

The customer and user tables also have Laravel `id`, `created_at`, and `updated_at` columns.
