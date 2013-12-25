<?php

use App\Models\User;

class UsersTableSeeder extends Seeder {
	
	public function run()
	{

		DB::table('users')->delete();

		$users = array(
			array(
				'id'		=>	1,
				'email'     =>	'admin1@a.com',
				'password'	=>	'admin',
				'activated' =>	1,
				'first_name'=>	'Admin',
				'last_name' =>	'Admin',
				'username'	=>	'srph',
				'city_id'	=>	1
			),

			array(
				'id'		=>	2,
				'email'     =>	'admin2@a.com',
				'password'	=>	'admin',
				'activated' =>	1,
				'first_name'=>	'Admin',
				'last_name' =>	'Admin',
				'username'	=>	'giangiangian',
				'city_id'	=>	2
			),

			array(
				'id'		=>	3,
				'email'     =>	'admin3@a.com',
				'password'	=>	'admin',
				'activated' =>	1,
				'first_name'=>	'Admin',
				'last_name' =>	'Admin',
				'username'	=>	'jcdoto',
				'city_id'	=>	3
			),

			array(
				'id'		=>	4,
				'email'     =>	'admin4@a.com',
				'password'	=>	'admin',
				'activated' =>	1,
				'first_name'=>	'Admin',
				'last_name' =>	'Admin',
				'username'	=>	'rupaheizu',
				'city_id'	=>	4
			),
		);

		foreach($users as $user){
			Sentry::getUserProvider()->create($user);
		}

	}
	
}