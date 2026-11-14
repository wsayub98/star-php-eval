# Installation Guide

This guide explains how to run the project on your computer. The project uses Laravel, Blade, Livewire, Bootstrap, and Vite. SQLite is the default database.

## 1. Prepare the tools

Install these tools first:

- PHP 8.5, as recommended in the README.
- Composer 2.x.
- Node.js 22.12 or newer. Node.js 24 LTS is a suitable choice.
- npm, which comes with Node.js.
- Git, if you want to clone the repository.

Make sure PHP has the `pdo_sqlite` and `sqlite3` extensions enabled. Composer will also check the other PHP requirements during installation.

Open a terminal and check the tools:

```bash
php -v
composer -V
node -v
npm -v
```

If a command is not found, check the installation and restart your terminal.

## 2. Get the project

Clone the repository:

```bash
git clone https://github.com/wsayub98/star-php-eval.git
cd star-php-eval
```

If you already have the project, open a terminal in its main folder. This is the folder that contains the `artisan` and `composer.json` files.

Run all commands below from this folder.

## 3. Install the dependencies

Install the PHP dependencies:

```bash
composer install
```

Install the frontend dependencies from `package-lock.json`:

```bash
npm ci
```

Use `composer install`, not `composer update`, to keep the package versions used by this project.

## 4. Set up the environment file

Copy `.env.example` to `.env`. Skip this step if `.env` already exists and contains your settings.

For Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

For macOS or Linux:

```bash
cp .env.example .env
```

In `.env`, keep the following settings for local use:

```dotenv
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
DB_CONNECTION=sqlite
```

The example file already uses SQLite. Leave `DB_DATABASE` commented out to use the default `database/database.sqlite` file.

Generate the application key:

```bash
php artisan key:generate
```

Do not share your `.env` file or commit it to Git. Only use `APP_DEBUG=true` on your local computer, not on a public server.

## 5. Create the database and sample data

Create the SQLite file if it does not exist. This command works in PowerShell, macOS, and Linux, and does not replace an existing file:

```bash
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
```

Run the migrations and seeders:

```bash
php artisan migrate --seed
```

This creates the tables and adds sample football categories and articles. The current `CategorySeeder` creates five categories with four articles each, for a total of 20 articles.

Do not run `php artisan db:seed` again unless you want to add another set of sample records. The current seeder adds records instead of updating existing ones.

### Optional: reset the local database

If you want a clean database with new sample data, run:

```bash
php artisan migrate:fresh --seed
```

**Warning: this command deletes all existing tables and data in the selected database. Check your `.env` settings first. Do not use it on a database that contains important data.**

## 6. Build the frontend

```bash
npm run build
```

This builds the CSS and JavaScript files used by the website.

## 7. Start the website

```bash
php artisan serve
```

Open this address in your browser:

```text
http://localhost:8000
```

You can also open `http://localhost:8000/articles`.

Keep the terminal open while using the website. Press `Ctrl+C` to stop the server.

## 8. Check the website

Check these features:

- The article list shows the sample football stories.
- Search filters articles by title as you type.
- Pagination lets you move between result pages.
- Clicking an article title opens its details page.
- The back link returns you to the article list.

Sample thumbnails use an external image URL. You need an internet connection to load them.

## Common problems

### `could not find driver`

Enable the `pdo_sqlite` and `sqlite3` extensions in the PHP configuration used by your terminal. Run `php --ini` to find the configuration file, then restart the terminal after making changes.

### `No application encryption key has been specified`

Run:

```bash
php artisan key:generate
```

### `Vite manifest not found`

Run:

```bash
npm ci
npm run build
```

### `no such table: articles` or `no such table: sessions`

Check that `.env` uses the correct database, then run:

```bash
php artisan migrate
```

If you also need sample articles on a new database, use `php artisan migrate --seed` instead.

### Changes to `.env` are not applied

Clear the cached configuration:

```bash
php artisan config:clear
```

### Port 8000 is already in use

Use another port:

```bash
php artisan serve --port=8001
```

Open `http://localhost:8001` and update `APP_URL` in `.env` if you continue using this port.
