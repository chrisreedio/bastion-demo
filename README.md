# Bastion Demo

A Laravel 13 + Filament 5 application for developing and showcasing
[chrisreedio/bastion](https://github.com/chrisreedio/bastion).

The demo loads Bastion from a local checkout through a Composer path repository
(`../bastion`, symlinked), so changes to the package show up here immediately.

## Setup

Clone both repositories side by side:

```bash
git clone https://github.com/chrisreedio/bastion
git clone https://github.com/chrisreedio/bastion-demo
cd bastion-demo

composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan bastion:sync admin
php artisan serve
```

Open `/admin` and sign in as `admin@example.com` / `password`. The seeded admin has the
`Developer` role, which the panel registers as Bastion's super admin role.

## What's wired up

- `App\Providers\Filament\AdminPanelProvider` registers `BastionPlugin` with `superAdminRole('Developer')`.
- `App\Models\User` uses Spatie's `HasRoles` and implements `FilamentUser`.
- Spatie Permission and Bastion migrations, `config/bastion.php`, and `RoleSeeder` are published.
- `php artisan bastion:sync admin` generates the policies in `app/Policies` and their permissions.

## Tests

```bash
php artisan test
```

## Amp orbs

The Bastion package repository's `.agents/setup` prepares this demo when it is checked out at
`../repos/bastion-demo`, and its `.amp/services.yaml` runs it as the `demo` service.
