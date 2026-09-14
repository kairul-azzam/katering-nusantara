<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => \App\Models\Customer::inRandomOrder()->first()->id,
            'payment_method_id' => \App\Models\PaymentMethod::inRandomOrder()->first()->id,
            'courier_id' => \App\Models\Courier::inRandomOrder()->first()->id,
            'status' => fake()->randomElement(['pending', 'diproses', 'dikirim', 'selesai']),
        ];
    }
}
