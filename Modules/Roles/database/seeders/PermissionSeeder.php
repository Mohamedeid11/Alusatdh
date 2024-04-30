<?php

namespace Modules\Roles\database\seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Modules\Admin\app\Models\Admin;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->delete();
        DB::table('model_has_roles')->delete();
        DB::table('model_has_permissions')->delete();

        app()['cache']->forget('spatie.permission.cache');

        $adminRole  =  Role::firstOrCreate(['guard_name' => 'web','name' => 'admin']);
        Role::firstOrCreate(['guard_name' => 'web','name' => 'student']);
        Role::firstOrCreate(['guard_name' => 'web','name' => 'coordinator']);

        $adminPermissions = [
            // roles
            'roles.read',
            'roles.create',
            'roles.edit',
            'roles.delete',

            //users
            'users.read',
            'users.create',
            'users.edit',
            'users.delete',

            //categories
            'countries.read',
            'countries.create',
            'countries.edit',
            'countries.delete',
        ];

        foreach ($adminPermissions as $permission) {
            Permission::firstOrCreate(['guard_name' => 'web','module' => 'User' ,'name' => $permission]);
        }
        $adminRole->givePermissionTo($adminPermissions);
        $admin = User::find(1);
        if($admin){
            $admin->assignRole('admin');
        }

    }
}
