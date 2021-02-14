<?php

use App\Model\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        // Role Admin
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        // Role pollster
        $role = new Role();
        $role->name = 'pollster';
        $role->description = 'Pollster';
        $role->save();

        // Role user
        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();
    
    }
}
