<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = tap(User::create([
                    'name' => 'Admin',
                    'email' => 'admin@mail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('admin'),
                ]), function (User $user) {
                    $this->createTeam($user);
                });
        $admin->assignRole('admin');

        AddingTeam::dispatch($user);

        $admin->ownedTeams()->create([
            'name' => 'member',
            'personal_team' => false,
        ]);
    }
    
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
