# IT0049 TFA7 — Laravel POS Forms and Image Upload

This Laravel POS extends the TFA6 customer and user account pages with validated create and edit forms. Staff can upload a profile image while editing a user; Laravel validates the upload, Intervention Image resizes it to a maximum 512 × 512 pixels and converts it to WebP, and the prepared image is stored on Laravel's public disk. The user table stores only the resulting relative path.

## Requirements

- PHP 8.2 or later with Laravel's required extensions and the GD extension enabled
- Composer
- SQLite or MySQL

Intervention Image's GD driver is used to prepare uploaded images. Enable `gd` in `php.ini` before using avatar uploads.

## Install and run

From this project directory:

```sh
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

On Windows PowerShell, use `Copy-Item .env.example .env` instead of `cp`. The example environment uses SQLite. To use MySQL, set the `DB_*` values in `.env` before running the migrations.

Open `http://127.0.0.1:8000`.

## Pages and workflows

- `/` — POS home
- `/about` — project details
- `/customers` — customer account listing
- `/customers/create` — validated customer creation
- `/customers/{customer}/edit` — edit a customer's name, email, and phone
- `/users` — user listing with avatar or placeholder
- `/users/create` — validated user creation with a unique username
- `/users/{user}/edit` — edit a user and optionally upload an avatar

Laravel returns validation errors and old form input automatically. Avatar uploads accept JPG, PNG, or WebP files up to 2 MB. Each is resized to fit inside 512 × 512 pixels, encoded as WebP, and stored under `storage/app/public/avatars`. The public storage link serves these files from `/storage`.

## Database files

- `database/migrations/2026_11_22_000001_create_customers_and_users_tables.php` creates the customer and user tables.
- `database/migrations/2026_11_22_000002_add_avatar_to_users_table.php` adds the nullable avatar path.
- `database/seeders/DatabaseSeeder.php` inserts repeatable sample customer and user records.

## Hosting

Set the production `.env` database and `APP_URL`, install Composer dependencies, run `php artisan migrate --seed`, and create the public storage link. Ensure `storage` and `bootstrap/cache` are writable by PHP. The host must have PHP GD enabled for avatar processing.
