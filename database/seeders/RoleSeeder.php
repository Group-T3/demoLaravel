<?php

namespace Database\Seeders;

use App\Enums\RoleStatus;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role :: Create([
            'name' => \App\Enums\Role::ADMIN,
            'desc' => 'Here is a short description of role Admin',
            'status' => RoleStatus::ACTIVE,
        ]);

        $role2 = Role :: Create([
            'name' =>  \App\Enums\Role::MOD,
            'desc' => 'Here is a short description of role Moderator',
            'status' => RoleStatus::ACTIVE,
        ]);
        $role3 = Role :: Create([
            'name' =>  \App\Enums\Role::MEMBER,
            'desc' => 'Here is a short description of role Member',
            'status' => RoleStatus::ACTIVE,
        ]);
    }
}
