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
            'name' => 'superadmin',
            'guard_name' => 'api'
        ]);
        Role::create([
            'name' => 'admin',
            'guard_name' => 'api'
        ]);
        Role::create([
            'name' => 'manager',
            'guard_name' => 'api'
        ]);
        Role::create([
            'name' => 'supervisor',
            'guard_name' => 'api'
        ]);


        // create Permission
        Permission::create([
            'name' => 'Read User',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'Create User',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'Edit User',
            'guard_name' => 'api'
        ]);
        Permission::create([
            'name' => 'Delete User',
            'guard_name' => 'api'
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
