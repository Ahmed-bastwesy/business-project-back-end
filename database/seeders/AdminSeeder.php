<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::updateOrCreate([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123456789),
            'address' => 'private address',
            'gender' => 'male',
            'type' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        $role = new Role;
        $role = $role->updateOrCreate(['name' => 'admin']);
        $admin->assignRole([$role->id]);
    }
}
