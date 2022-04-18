<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Admin User H01',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'), // password
        ];
        User::insert($user);

        $user = [
            'name' => 'Erster Fux H22',
            'email' => 'demo@wingolf-halle.de',
            'password' => Hash::make('password'), // password
        ];
        User::insert($user);
    }
}
