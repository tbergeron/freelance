<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();

		// UserTableSeeder
		User::create(array(
            'email' => 'user@host.com',
            'password' => Hash::make('password'),
            'full_name' => 'Test User',
            'is_admin' => true
        ));
	}
}