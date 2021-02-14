<?php

use App\Model\User;
use App\Model\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::truncate();

        $user = User::create([
            'name' => 'krionoah',
            'email' => 'licrojasrafael@icloud.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin234*'),
            'remember_token' => Str::random(10)
        ]);

        $user->roles()->attach(Role::where('name', 'admin')->first());

        factory(User::class, 45)->create()->each(function($u) {
            $u->roles()->attach(Role::where('name', 'pollster')->first());
        });

    }
}
