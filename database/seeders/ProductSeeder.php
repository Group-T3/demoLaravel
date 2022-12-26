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
            'img' => 'https://cdn.tgdd.vn/Products/Images/42/251192/iphone-14-pro-max-purple-1.jpg',
            'desc' => 'Apple',
            'category_id' => '1'
        ]);

        $product2 = Product :: Create([
            'name' => 'Macbook Pro M2',
            'qty' => '20',
            'price' =>'599.99',
            'img' => 'https://cdn.tgdd.vn/Products/Images/44/282828/apple-macbook-pro-13-inch-m2-2022-1.jpg',
            'desc' => 'Apple',
            'category_id' => '1'
        ]);

        $product3 = Product :: Create([
            'name' => 'iPad Pro M2',
            'qty' => '50',
            'price' =>'199.99',
            'img' => 'https://cdn.tgdd.vn/Products/Images/522/269331/ipad-pro-m1-129-inch-wifi-2021-1.jpeg',
            'desc' => 'Apple',
            'category_id' => '1'
        ]);
    }
}
