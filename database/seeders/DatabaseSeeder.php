<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Demo Admin', 'password' => 'password'],
        );

        $admin->syncRoles(['Developer']);
    }
}
