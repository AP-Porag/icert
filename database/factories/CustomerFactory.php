<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $array =[Customer::CUSTOMER_FOR_ICERT,Customer::CUSTOMER_FOR_KSA];
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'contact_name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'customer_for' => fake()->randomElement($array),
        ];
    }
}
