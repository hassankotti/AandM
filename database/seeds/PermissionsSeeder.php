<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class PermissionsSeeder extends Seeder
{

    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create_category']);
        Permission::create(['name' => 'delete_category']);
        Permission::create(['name' => 'edit_category']);
        Permission::create(['name' => 'create_product']);
        Permission::create(['name' => 'show_product']);
        Permission::create(['name' => 'edit_product']);
        Permission::create(['name' => 'delete_product']);


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('create_category');
        $role1->givePermissionTo('delete_category');
        $role1->givePermissionTo('edit_category');


        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('create_product');
        $role2->givePermissionTo('show_product');
        $role2->givePermissionTo('edit_product');
        $role2->givePermissionTo('delete_product');

        $role3 = Role::create(['name' => 'super-admin']);


    }
}