<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            MedicineSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Umar',
            'email' => 'umarslash1885@gmail.com',
            'password' => 'testing123',
        ])
            ->assignRole(config('system.roles.admin'));
    }
}
