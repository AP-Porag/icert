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


        $sku = ['ic202301','ic202302','ic202303','ic202304','ic202305','ic202306','ic202307','ic202308','ic202309','ic202310'];
        return [
            'entrySKU'=>fake()->randomElement($sku),
            'name'=>fake()->name,
            'qty'=>1,
            'customer_id'=>fake()->randomElement([1,2,3,4,5,6,7,8,9,10]),
        ];
    }
}
