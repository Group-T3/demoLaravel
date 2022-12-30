<?php

namespace Database\Seeders;

use App\Enums\CategoryStatus;
use App\Models\Category;
use BenSampo\Enum\Enum;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $category1 = Category :: Create([
            'name' => 'Technology',
            'desc' => 'Here is a short description of Technology',
            'status' => CategoryStatus::ACTIVE,
        ]);

        $category2 = Category :: Create([
            'name' => 'Electronice',
            'desc' => 'Here is a short description of Electronice',
            'status' => CategoryStatus::ACTIVE,
        ]);
    }
}
