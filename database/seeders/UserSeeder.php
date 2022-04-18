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
            'name' => 'Willi Helwig H15',
            'email' => 'admin@wingolf-halle.de',
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
