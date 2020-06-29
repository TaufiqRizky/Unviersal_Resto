<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Role::create(['role'=> 'admin']);
        Role::create(['role'=> 'koki']);
        Role::create(['role'=> 'pantry']);
        Role::create(['role'=> 'pelayan']);
        Role::create(['role'=> 'kasir']);

    }
}
