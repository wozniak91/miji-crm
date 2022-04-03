<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Rafał',
            'email' => 'ra123al@gmail.com',
            'password' => Hash::make('rafal123'),
        ]);

        $user->roles()->attach([1, 2]);
    }
}
