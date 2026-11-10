# WRISTORY

**A watch marketplace with customer, seller and administrator areas.**

[Overview](#overview) · [Local setup](#local-setup) · [Code guide](#code-guide) · [Verification](#verification)

## Overview

A Laravel 12 e-commerce project centred on watches. The codebase includes catalogue and review workflows, a shopping cart, seller and administrator route groups, and Stripe checkout integration.

## Features

- Watch catalogue and review management.
- Customer authentication and profile flows.
- Shopping cart with quantity updates and item removal.
- Stripe checkout routes with success and cancellation pages.
- Separate seller and administrator routes.

## Technology

| Layer | Stack |
| --- | --- |
| Backend | PHP `^8.2` · Laravel `^12.0` |
| Interface and tooling | Blade · Tailwind CSS · Vite 7 · Stripe |
| Data | Eloquent ORM · SQLite by default; other configured drivers are available |

Version constraints above come from [composer.json](composer.json) and [package.json](package.json). Use a PHP runtime compatible with `composer.lock`, Composer 2, and a Node.js/npm version compatible with the declared asset tooling. Enable the PHP extensions required by Composer and the selected database driver.

## Local setup

```bash
git clone https://github.com/Moelnabawy8/WRISTORY.git
cd WRISTORY
composer install
cp .env.example .env
php artisan key:generate
npm ci
```

Create the SQLite file if it does not already exist, and point `DB_DATABASE` in your local `.env` to its absolute path:

```bash
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
```

Keep `DB_CONNECTION=sqlite` for this setup. Set `APP_URL=http://127.0.0.1:8000`. For local mail inspection, set `MAIL_MAILER=log` instead of configuring a live mail provider.

```bash
php artisan migrate
php artisan storage:link
npm run build
php artisan serve
```

Open [the local application](http://127.0.0.1:8000). For asset hot reload, run `npm run dev` in a second terminal while the PHP server remains running.

## Payments and local development

Configure `STRIPE_KEY` and `STRIPE_SECRET` in your local `.env` to exercise Stripe checkout. Use Stripe test-mode credentials and test payment details. The catalogue and authentication can be explored independently of a successful payment.

Authenticated store pages are under `/web`; `/cart` and `/checkout/{watch}` are defined in [routes/web.php](routes/web.php). Seller and administrator access depends on the configured account role/guard.

## Code guide

| Path | Responsibility |
| --- | --- |
| [`routes/web.php`](routes/web.php) | Storefront, cart and checkout routes |
| [`routes/seller.php`](routes/seller.php) | Seller workspace routes |
| [`routes/admin.php`](routes/admin.php) | Administrator routes |
| [`app/Models/`](app/Models/) | Watches, brands, orders, reviews and users |
| [`config/services.php`](config/services.php) | Environment-backed Stripe configuration |

## Verification

The repository contains authentication and profile scaffolding tests. Checkout, seller permissions and cart behaviour need dedicated application-level verification.

Use an isolated testing database and review [phpunit.xml](phpunit.xml) before running the suite. Database-resetting tests must point to disposable data.

```bash
php artisan test
```

To check PHP formatting without modifying files:

```bash
./vendor/bin/pint --test
```

Build the front-end assets with `npm run build` after changing JavaScript, CSS or templates. Keep local configuration in `.env` and commit only configuration examples.
