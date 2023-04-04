<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create role
        Role::create([
            'name' => 'superadmin'
        ]);
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'manager'
        ]);
        Role::create([
            'name' => 'supervisor'
        ]);


        // create Permission
        Permission::create([
            'name' => 'Read User'
        ]);
        Permission::create([
            'name' => 'Create User'
        ]);
        Permission::create([
            'name' => 'Edit User'
        ]);
        Permission::create([
            'name' => 'Delete User'
        ]);



        // create user admin dan superadmin
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('superadmin')
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        // assign user role
        $superadmin->assignRole('superadmin');
        $admin->assignRole('admin');
    }
}
