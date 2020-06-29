<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        

        $adminRole = Role::where('role', 'admin')->first();
        $kokiRole = Role::where('role', 'koki')->first();
        $pantryRole = Role::where('role', 'pantry')->first();
        $pelayanRole = Role::where('role', 'pelayan')->first();
        $kasirnRole = Role::where('role', 'kasir')->first();

        $admin = User::create([
        	'name'=>'Lord Triz',
        	'email'=>'taufiq.it2@gmail.com',
        	'password'=>Hash::make('taufiqganteng')
        ]);

        $koki = User::create([
        	'name'=>'Chef Reza',
        	'email'=>'Reza@gmail.com',
        	'password'=>Hash::make('lordtaufiq')
        ]);

        $pantry = User::create([
        	'name'=>'Ilham',
        	'email'=>'ham@gmail.com',
        	'password'=>Hash::make('lordtaufiq')
        ]);

        $pelayan = User::create([
        	'name'=>'Hilmy Naupal',
        	'email'=>'HilmyBlaze@gmail.com',
        	'password'=>Hash::make('lordtaufiq')
        ]);

        $kasir = User::create([
            'name'=>'Aku Kasir',
            'email'=>'kasir@gmail.com',
            'password'=>Hash::make('lordtaufiq')
        ]);

        $admin->roles()->attach($adminRole);
        $koki->roles()->attach($kokiRole);
        $pantry->roles()->attach($pantryRole);
        $pelayan->roles()->attach($pelayanRole);
        $kasir->roles()->attach($kasirnRole);
    }
}
