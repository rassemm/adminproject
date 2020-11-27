<?php

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
        $user = \App\User::create ([
            'name'=>'super admin',
            'email'=>'super_admin@app.com',
            'password'=>bcrypt('secret')
            
        ]);
        $user->attachRole('super_admin');
    }
}
