<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $category1 = Category :: Create([
            'name' => 'Technology',
            'desc' => 'Here is a short description of Technology',
        ]);

        $category2 = Category :: Create([
            'name' => 'Electronice',
            'desc' => 'Here is a short description of Electronice',
        ]);
    }
}
