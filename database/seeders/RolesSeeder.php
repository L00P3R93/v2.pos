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
            'view_users',
            'create_users',
            'update_users',
            'delete_users',

            'view_roles',
            'create_roles',
            'update_roles',
            'delete_roles',

            'view_permissions',
            'create_permissions',
            'update_permissions',
            'delete_permissions',

            'view_brands',
            'create_brands',
            'update_brands',
            'delete_brands',

            'view_categories',
            'create_categories',
            'update_categories',
            'delete_categories',

            'view_products',
            'create_products',
            'update_products',
            'delete_products',

            'view_inventory',
            'create_inventory',
            'update_inventory',
            'delete_inventory',

            'view_customers',
            'create_customers',
            'update_customers',
            'delete_customers',

            'view_orders',
            'create_orders',
            'update_orders',
            'delete_orders',

            'view_payments',
            'create_payments',
            'update_payments',
            'delete_payments',

            'view_settings',
            'create_settings',
            'update_settings',
            'delete_settings',

            'view_reports',
            'create_reports',
            'update_reports',
            'delete_reports',
        ];

        foreach ($permissions as $permission) {
            Permission::query()->firstOrCreate(['name' => $permission]);
        }

        // Define Roles and assign permissions
        $roles = [
            'Super Admin' => $permissions,
            'Admin' => $permissions,
            'Manager' => [
                'view_users',
                'create_users',
                'update_users',
                'delete_users',

                'view_brands',
                'create_brands',
                'update_brands',
                'delete_brands',

                'view_categories',
                'create_categories',
                'update_categories',
                'delete_categories',

                'view_products',
                'create_products',
                'update_products',
                'delete_products',

                'view_inventory',
                'create_inventory',
                'update_inventory',
                'delete_inventory',

                'view_customers',
                'create_customers',
                'update_customers',
                'delete_customers',

                'view_orders',
                'create_orders',
                'update_orders',
                'delete_orders',

                'view_payments',
                'create_payments',
                'update_payments',
                'delete_payments',

                'view_reports',
                'create_reports',
                'update_reports',
                'delete_reports',
            ],
            'Accountant' => [
                'view_orders',
                'create_orders',
                'update_orders',
                'delete_orders',

                'view_payments',
                'create_payments',
                'update_payments',
                'delete_payments',

                'view_reports',
                'create_reports',
                'update_reports',
                'delete_reports',
            ],
            'Inventory' => [
                'view_brands',
                'create_brands',
                'update_brands',
                'delete_brands',

                'view_categories',
                'create_categories',
                'update_categories',
                'delete_categories',

                'view_products',
                'create_products',
                'update_products',
                'delete_products',

                'view_inventory',
                'create_inventory',
                'update_inventory',
                'delete_inventory',
            ],
            'Sales' => [
                'view_brands',

                'view_categories',

                'view_products',

                'view_customers',
                'create_customers',
                'update_customers',

                'view_orders',
                'create_orders',
                'update_orders',

                'view_payments',
                'create_payments',
            ],
        ];

        foreach ($roles as $role => $permissions) {
            $role = Role::query()->firstOrCreate(['name' => $role]);
            $role->syncPermissions($permissions);
        }
    }
}
