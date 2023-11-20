<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Check',
            ],
            [
                'name'        => 'Display Box',
            ],
            [
                'name'        => 'First Day Cover',
            ],
            [
                'name'        => 'Food',
            ],
            [
                'name'        => 'Index Card',
            ],
            [
                'name'        => 'Pack',
            ],
            [
                'name'        => 'Pass',
            ],
            [
                'name'        => 'Photo',
            ],
            [
                'name'        => 'Postcard',
            ],
            [
                'name'        => 'Rack Pack',
            ],
            [
                'name'        => 'Set',
            ],
            [
                'name'        => 'Ticket',
            ],
            [
                'name'        => 'Wax Box',
            ],
            [
                'name'        => 'Wrapper',
            ],
            [
                'name'        => 'Reholder',
            ],
            [
                'name'        => 'Crossover',
            ],
        ];


        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
