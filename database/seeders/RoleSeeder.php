<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        collect(config('system.roles'))->each(fn ($i) => Role::create(['name' => $i]));
    }
}
