<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'business_founder', 'client'];

        foreach ($roles as $role) :
            Role::create([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        endforeach;
    }
}
