<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'id' => 1,
			'user' => 'admin@yuriyurchenko.com',
			'password' => Hash::make('akunamatata'),
		));

	}

}