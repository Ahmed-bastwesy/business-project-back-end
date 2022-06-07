<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business_founder_role = new Role;
        $business_founder_role = $business_founder_role->updateOrCreate(['name' => 'business_founder']);

        $client_role = new Role;
        $client_role = $client_role->updateOrCreate(['name' => 'client']);

        $users = User::factory(20)->create();

        foreach ($users as $user) :
            if ($user->type == 'business_founder') :
                $user->assignRole([$business_founder_role->id]);
            elseif ($user->type == 'client') :
                $user->assignRole([$client_role->id]);
            endif;
        endforeach;
    }
}
