<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $this->generatePermissions();
        $this->setupRolesAndPermissions();
        $this->assignStaticRoles();
    }

    private function generatePermissions(): void
    {
        Artisan::call('shield:generate', [
            '--all'            => true,
            '--option'         => 'policies_and_permissions',
            '--panel'          => 'admin',
            '--no-interaction' => true,
        ]);
    }

    private function setupRolesAndPermissions(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        //     'ViewAny:User',
        //     'View:User',
        //     'Create:User',
        //     'Update:User',
        //     'Delete:User',
        //     'Restore:User',
        //     'ForceDelete:User',
        //     'ForceDeleteAny:User',
        //     'RestoreAny:User',
        //     'Replicate:User',
        //     'Reorder:User'

        $adminPermissions = [];
        $userPermissions = [];

        $adminRole->givePermissionTo($adminPermissions);
        $userRole->syncPermissions($userPermissions);
    }

    private function assignStaticRoles(): void
    {
        $roleMap = [
            'superadmin' => 'super_admin',
            'admin'      => 'admin',
            'user'       => 'user',
        ];

        foreach ($roleMap as $username => $role) {
            $user = User::where('username', $username)->first();
            if ($user) {
                $user->assignRole($role);
            }
        }
    }
}
