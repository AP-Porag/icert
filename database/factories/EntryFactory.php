<?php

namespace Database\Factories;

use App\Models\Entry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entry>
 */
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            for ($x = 1; $x <= 10; $x++) {
                $entrySKU = $x;
                $entrySKU = 202300+$entrySKU;
            }


        $sku = ['IC202301','IC202302','IC202303','IC202304','IC202305','IC202306','IC202307','IC202308','IC202309','IC202310'];
        return [
            'entrySKU'=>fake()->randomElement($sku),
            'name'=>fake()->name,
            'qty'=>1,
            'customer_id'=>fake()->randomElement([1,2,3,4,5,6,7,8,9,10]),
        ];
    }
}
