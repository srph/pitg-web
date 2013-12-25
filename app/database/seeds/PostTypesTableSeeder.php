<?php

class PostTypesTableSeeder extends Seeder {
	
	public function run()
	{

		DB::table('post_types')->delete();
		
		$post_types = array(

			array(
				'id'	=>	1,
				'title'	=>	'Question'
			),

			array(
				'id'	=>	2,
				'title'	=>	'Discussion'
			),

			array(
				'id'	=>	3,
				'title'	=>	'Reference'
			),

			array(
				'id'	=>	4,
				'title'	=>	'News'
			),

			array(
				'id'	=>	5,
				'title'	=>	'Poll'
			),

		);

		DB::table('post_types')->insert($post_types);
	}
	
}