<?php

class RepliesTableSeeder extends Seeder {
	
	public function run()
	{

		DB::table('replies')->delete();

		$replies = array(

			array(
				'post_id'		=>	1,
				'user_id'		=>	1,
				'body'			=>	'Hello World',
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime
			),


			array(
				'post_id'		=>	1,
				'user_id'		=>	1,
				'body'			=>	'Hello World',
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime
			),

			array(
				'post_id'		=>	1,
				'user_id'		=>	1,
				'body'			=>	'Hello World',
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime
			),


			array(
				'post_id'		=>	1,
				'user_id'		=>	2,
				'body'			=>	'Hello World',
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime
			),

			array(
				'post_id'		=>	1,
				'user_id'		=>	3,
				'body'			=>	'Hello World',
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime
			),		
			
		);

		DB::table('replies')->insert($replies);
	}
	
}