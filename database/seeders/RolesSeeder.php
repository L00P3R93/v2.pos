<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'view users',
            'create users',
            'update users',
            'delete users',

            'view roles',
            'create roles',
            'update roles',
            'delete roles',

            'view permissions',
            'create permissions',
            'update permissions',
            'delete permissions',

            'view brands',
            'create brands',
            'update brands',
            'delete brands',

            'view categories',
            'create categories',
            'update categories',
            'delete categories',

            'view products',
            'create products',
            'update products',
            'delete products',

            'view inventory',
            'create inventory',
            'update inventory',
            'delete inventory',

            'view customers',
            'create customers',
            'update customers',
            'delete customers',

            'view orders',
            'create orders',
            'update orders',
            'delete orders',

            'view payments',
            'create payments',
            'update payments',
            'delete payments',

            'view settings',
            'create settings',
            'update settings',
            'delete settings',

            'view reports',
            'create reports',
            'update reports',
            'delete reports',
        ];

        foreach ($permissions as $permission) {
            Permission::query()->firstOrCreate(['name' => $permission]);
        }

        // Define Roles and assign permissions
        $roles = [
            'Admin' => $permissions,
            'Manager' => [
                'view users',
                'create users',
                'update users',
                'delete users',

                'view brands',
                'create brands',
                'update brands',
                'delete brands',

                'view categories',
                'create categories',
                'update categories',
                'delete categories',

                'view products',
                'create products',
                'update products',
                'delete products',

                'view inventory',
                'create inventory',
                'update inventory',
                'delete inventory',

                'view customers',
                'create customers',
                'update customers',
                'delete customers',

                'view orders',
                'create orders',
                'update orders',
                'delete orders',

                'view payments',
                'create payments',
                'update payments',
                'delete payments',

                'view reports',
                'create reports',
                'update reports',
                'delete reports',
            ],
            'Accountant' => [
                'view orders',
                'create orders',
                'update orders',
                'delete orders',

                'view payments',
                'create payments',
                'update payments',
                'delete payments',

                'view reports',
                'create reports',
                'update reports',
                'delete reports',
            ],
            'Inventory' => [
                'view brands',
                'create brands',
                'update brands',
                'delete brands',

                'view categories',
                'create categories',
                'update categories',
                'delete categories',

                'view products',
                'create products',
                'update products',
                'delete products',

                'view inventory',
                'create inventory',
                'update inventory',
                'delete inventory',
            ],
            'Sales' => [
                'view brands',

                'view categories',

                'view products',

                'view customers',
                'create customers',
                'update customers',

                'view orders',
                'create orders',
                'update orders',

                'view payments',
                'create payments',
            ],
        ];

        foreach ($roles as $role => $permissions) {
            $role = Role::query()->firstOrCreate(['name' => $role]);
            $role->syncPermissions($permissions);
        }
    }
}
