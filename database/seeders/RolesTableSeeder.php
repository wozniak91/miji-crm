<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'super',
            'admin',
            'moderator',
            'user'
        ];
        
        foreach ($roles as $role) {
            Role::updateOrcreate(
                [
                    'name' => $role
                ]
            );
        }
    }
}
