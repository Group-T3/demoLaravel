<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role :: Create([
            'name' => \App\Enums\Role::ADMIN,
            'desc' => 'Here is a short description of role Admin',
        ]);

        $role2 = Role :: Create([
            'name' =>  \App\Enums\Role::MOD,
            'desc' => 'Here is a short description of role Moderator',
        ]);
        $role3 = Role :: Create([
            'name' =>  \App\Enums\Role::MEMBER,
            'desc' => 'Here is a short description of role Member',
        ]);
    }
}
