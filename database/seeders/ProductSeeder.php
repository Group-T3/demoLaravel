<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $product1 = Product :: Create([
            'name' => 'iPhone 14 Pro Max',
            'qty' => '10',
            'price' =>'99.99',
            'img' => fake()->imageUrl(),
            'desc' => 'Apple',
            'category_id' => '1'
        ]);

        $product2 = Product :: Create([
            'name' => 'Macbook Pro M2',
            'qty' => '20',
            'price' =>'599.99',
            'img' => fake()->imageUrl(),
            'desc' => 'Apple',
            'category_id' => '1'
        ]);

        $product3 = Product :: Create([
            'name' => 'iPad Pro M2',
            'qty' => '50',
            'price' =>'199.99',
            'img' => fake()->imageUrl(),
            'desc' => 'Apple',
            'category_id' => '1'
        ]);
    }
}
