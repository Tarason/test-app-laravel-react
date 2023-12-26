<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionRoleSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'view users', 'guard_name' => 'web']);
        Permission::create(['name' => 'create users', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit users', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete users', 'guard_name' => 'web']);

        $userRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole = Role::create(['name' => 'regular',  'guard_name' => 'web']);

        $adminRole->givePermissionTo(Permission::all());

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole($adminRole);


        $user = User::factory()->create([
            'name' => 'Regular',
            'email' => 'regular@example.com',
        ]);
        $user->assignRole($adminRole);
    }
}


