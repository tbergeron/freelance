<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'username' => 'testuser',
            'password' => Hash::make('password'),
            'email' => 'test@test.com',
            'is_admin' => true
        ]);

        User::create([
            'username' => 'dummyuser',
            'password' => Hash::make('password'),
            'email' => 'false@false.com'
        ]);

    }
}