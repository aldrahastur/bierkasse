<?php

namespace Database\Seeders;

use App\Actions\Jetstream\CreateTeam;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;

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
            'firstname' => 'Admin',
            'lastname' => 'User H01',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'), // password
        ];
        $user = User::create($user);

        $teamCreationHelper = new CreateTeam();

        $team = $teamCreationHelper->create($user, [
            'name' => 'Hallenser Wingolf',
        ]);
        $team->users()->attach(Jetstream::findUserByEmailOrFail($user['email']), ['role' => 'admin']);

        $user = [
            'firstname' => 'Erster',
            'lastname' => 'Fux H22',
            'email' => 'demo@wingolf-halle.de',
            'password' => Hash::make('password'), // password
        ];
        User::create($user);
        $team->users()->attach(Jetstream::findUserByEmailOrFail($user['email']), ['role' => 'editor']);
    }
}
