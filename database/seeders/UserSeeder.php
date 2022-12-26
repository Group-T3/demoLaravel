<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user1 = User:: Create([
            'fullname' => 'Admin',
            'avt' => fake()->imageUrl(),
            'address' => 'Ha Noi',
            'email' => 'admin@gmail.com',
            'phonenumber' => '0998689866',
            'role_id' => '1',
            'password' => bcrypt('123456'),
        ]);
        $user2 = User:: Create([
            'fullname' => 'Moderator',
            'avt' => fake()->imageUrl(),
            'address' => 'Hai Phong',
            'email' => 'mod@gmail.com',
            'phonenumber' => '0989056896',
            'role_id' => '2',
            'password' => bcrypt('123456'),
        ]);
        $user3 = User:: Create([
            'fullname' => 'User',
            'avt' => fake()->imageUrl(),
            'address' => 'TP Ho Chi Minh',
            'email' => 'user@gmail.com',
            'phonenumber' => '0986966906',
            'role_id' => '3',
            'password' => bcrypt('123456'),
        ]);
    }
}
