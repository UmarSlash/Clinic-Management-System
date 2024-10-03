<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();
        collect(config('system.permissions'))->flatten(1)->each(fn ($i) => Permission::firstOrCreate(['name' => $i]));

        $roles->each(function ($item) {
            if ($item['name'] == config('system.roles.admin'))
            {
                $item->givePermissionTo([
                    config('system.permissions.dashboard.index'),
                ]);
            }
            else if ($item['name'] == config('system.roles.doctor'))
            {
                $item->givePermissionTo([
                    config('system.permissions.dashboard.index'),
                ]);
            }
        });
    }
}
