<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Pill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pill>
 */
class PillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pill::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'confirm_date' => now(),
            'order_id' => Order::inRandomOrder()->first()->id,
        ];
    }
}
