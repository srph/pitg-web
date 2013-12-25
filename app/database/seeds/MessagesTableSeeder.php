<?php

class MessagesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('messages')->delete();

		$messages = array(
			array(
				'user_id'	=>	2,
				'recepient_id'	=>	1,
				'title'		=>	'Hello World',
				'body'		=>	'Hello World',
				'read'		=>	1,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new DateTime
			),

			array(
				'user_id'	=>	2,
				'recepient_id'	=>	1,
				'title'		=>	'Hello World',
				'body'		=>	'Hello World',
				'read'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new DateTime
			),

			array(
				'user_id'	=>	2,
				'recepient_id'	=>	1,
				'title'		=>	'Hello World',
				'body'		=>	'Hello World',
				'read'		=>	1,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new DateTime
			),

			array(
				'user_id'	=>	2,
				'recepient_id'	=>	1,
				'title'		=>	'Hello World',
				'body'		=>	'Hello World',
				'read'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new DateTime
			),

			array(
				'user_id'	=>	3,
				'recepient_id'	=>	1,
				'title'		=>	'Hello World',
				'body'		=>	'Hello World',
				'read'		=>	1,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new DateTime
			),

			array(
				'user_id'	=>	1,
				'recepient_id'	=>	2,
				'title'		=>	'Hello World',
				'body'		=>	'Hello World',
				'read'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new DateTime
			),

			array(
				'user_id'	=>	4,
				'recepient_id'	=>	2,
				'title'		=>	'Hello World',
				'body'		=>	'Hello World',
				'read'		=>	1,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new DateTime
			),

			array(
				'user_id'	=>	3,
				'recepient_id'	=>	4,
				'title'		=>	'Hello World',
				'body'		=>	'Hello World',
				'read'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new DateTime
			),
		);

		DB::table('messages')->insert($messages);
	}
}