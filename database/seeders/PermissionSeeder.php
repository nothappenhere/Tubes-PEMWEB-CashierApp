<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin',
            ],
            ['name' => 'admin']
        );

        $role_user = Role::updateOrCreate(
            [
                'name' => 'user',
            ],
            ['name' => 'user']
        );

        $role_guest = Role::updateOrCreate(
            [
                'name' => 'guest',
            ],
            ['name' => 'guest']
        );

        $permission = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard',
            ],
            ['name' => 'view_dashboard']
        );

        $permission_kedua = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard_user_guest',
            ],
            ['name' => 'view_dashboard_user_guest']
        );

        $role_admin->givePermissionTo($permission);
        $role_user->givePermissionTo($permission_kedua);
        $role_guest->givePermissionTo($permission_kedua);

        $user = User::find(1);
        $user_kedua = User::find(2);
        $user_ketiga = User::find(3);

        $user->assignRole('admin');
        $user_kedua->assignRole('user');
        $user_ketiga->assignRole('user'); 
    }
}
