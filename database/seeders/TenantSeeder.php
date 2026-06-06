<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        $tenants = [
            ['name' => 'Tenant 1'],
            ['name' => 'Tenant 2'],
            ['name' => 'Tenant 3'],
        ];

        foreach ($tenants as $tenant) {
            Tenant::create($tenant);
        }
    }
}
