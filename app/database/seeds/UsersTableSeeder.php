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
				'country'	=>	'Philippines'
			),

			array(
				'id'		=>	2,
				'email'     =>	'admin2@a.com',
				'password'	=>	'admin',
				'activated' =>	1,
				'first_name'=>	'Admin',
				'last_name' =>	'Admin',
				'username'	=>	'giangiangian',
				'country'	=>	'Philippines'
			),

			array(
				'id'		=>	3,
				'email'     =>	'admin3@a.com',
				'password'	=>	'admin',
				'activated' =>	1,
				'first_name'=>	'Admin',
				'last_name' =>	'Admin',
				'username'	=>	'jcdoto',
				'country'	=>	'Philippines'
			),

			array(
				'id'		=>	4,
				'email'     =>	'admin4@a.com',
				'password'	=>	'admin',
				'activated' =>	1,
				'first_name'=>	'Admin',
				'last_name' =>	'Admin',
				'username'	=>	'rupaheizu',
				'country'	=>	'Philippines'
			),
		);

		foreach($users as $user){
			Sentry::getUserProvider()->create($user);
		}

	}
	
}