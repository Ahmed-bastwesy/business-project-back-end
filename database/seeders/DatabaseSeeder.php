<?php

namespace Database\Seeders;

use App\Models\ProductMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RolesSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,

            CategorySeeder::class,
            BusinessSeeder::class,

            ProductSeeder::class,
            TagSeeder::class,
            ProductTagSeeder::class,
            MaterialSeeder::class,
            ProductMaterialSeeder::class,

            OrderSeeder::class,
            OrderProductSeeder::class,
            PillSeeder::class,
            CartSeeder::class

            
        ]);
    }
}
