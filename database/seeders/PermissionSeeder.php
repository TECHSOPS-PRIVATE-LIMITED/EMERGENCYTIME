<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $permissions = collect([
            ['name' => 'user create', 'module_name' => 'user',],
            ['name' => 'user update', 'module_name' => 'user',],
            ['name' => 'user delete', 'module_name' => 'user',],
            ['name' => 'user show', 'module_name' => 'user',],
            ['name' => 'user index', 'module_name' => 'user',],

            ['name' => 'permission index', 'module_name' => 'permission'],
            ['name' => 'permission create', 'module_name' => 'permission'],
            ['name' => 'permission update', 'module_name' => 'permission'],
            ['name' => 'permission delete', 'module_name' => 'permission'],
            ['name' => 'permission show', 'module_name' => 'permission'],

            ['name' => 'role index', 'module_name' => 'role'],
            ['name' => 'role create', 'module_name' => 'role'],
            ['name' => 'role update', 'module_name' => 'role'],
            ['name' => 'role delete', 'module_name' => 'role'],
            ['name' => 'role show', 'module_name' => 'role'],

            ['name' => 'database_backup viewAny', 'module_name' => 'database_backup'],
            ['name' => 'database_backup create', 'module_name' => 'database_backup'],
            ['name' => 'database_backup delete', 'module_name' => 'database_backup'],
            ['name' => 'database_backup download', 'module_name' => 'database_backup'],

            ['name'=>'menu users_list', 'module_name'=>'menu'],
            ['name'=>'menu role_permission', 'module_name'=>'menu'],
            ['name'=>'menu role_permission_permissions', 'module_name'=>'menu'],
            ['name'=>'menu role_permission_roles', 'module_name'=>'menu'],
            ['name'=>'menu database_backup', 'module_name'=>'menu'],

            ['name' => 'facility index', 'module_name' => 'facility'],
            ['name' => 'facility create', 'module_name' => 'facility'],
            ['name' => 'facility update', 'module_name' => 'facility'],
            ['name' => 'facility delete', 'module_name' => 'facility'],
            ['name' => 'facility show', 'module_name' => 'facility'],

            ['name' => 'equipment index', 'module_name' => 'equipment'],
            ['name' => 'equipment create', 'module_name' => 'equipment'],
            ['name' => 'equipment update', 'module_name' => 'equipment'],
            ['name' => 'equipment delete', 'module_name' => 'equipment'],
            ['name' => 'equipment show', 'module_name' => 'equipment'],

            ['name' => 'medical_staff index', 'module_name' => 'medical_staff'],
            ['name' => 'medical_staff create', 'module_name' => 'medical_staff'],
            ['name' => 'medical_staff update', 'module_name' => 'medical_staff'],
            ['name' => 'medical_staff delete', 'module_name' => 'medical_staff'],
            ['name' => 'medical_staff show', 'module_name' => 'medical_staff'],

            ['name' => 'specialty index', 'module_name' => 'specialty'],
            ['name' => 'specialty create', 'module_name' => 'specialty'],
            ['name' => 'specialty update', 'module_name' => 'specialty'],
            ['name' => 'specialty delete', 'module_name' => 'specialty'],
            ['name' => 'specialty show', 'module_name' => 'specialty'],

            ['name' => 'treatment index', 'module_name' => 'treatment'],
            ['name' => 'treatment create', 'module_name' => 'treatment'],
            ['name' => 'treatment update', 'module_name' => 'treatment'],
            ['name' => 'treatment delete', 'module_name' => 'treatment'],
            ['name' => 'treatment show', 'module_name' => 'treatment'],

            ['name' => 'subscription index', 'module_name' => 'subscription'],
            ['name' => 'subscription create', 'module_name' => 'subscription'],
            ['name' => 'subscription update', 'module_name' => 'subscription'],
            ['name' => 'subscription delete', 'module_name' => 'subscription'],
            ['name' => 'subscription show', 'module_name' => 'subscription'],

            ['name' => 'category index', 'module_name' => 'category'],
            ['name' => 'category create', 'module_name' => 'category'],
            ['name' => 'category update', 'module_name' => 'category'],
            ['name' => 'category delete', 'module_name' => 'category'],
            ['name' => 'category show', 'module_name' => 'category'],

        ]);

        $web = collect([]);

        $permissions->map(function ($permission) use ($web) {
            $web->push([
                'name' => $permission['name'],
                'module_name' => $permission['module_name'],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        Permission::insert($web->toArray());
    }
}
