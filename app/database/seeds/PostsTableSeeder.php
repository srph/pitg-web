<?php

class PostsTableSeeder extends Seeder {
	
	public function run()
	{

		DB::table('posts')->delete();
		
		$posts = array(

			array(
				'id'			=>	1,
				'user_id'		=>	1,
				'post_type_id'	=>	1,
				'category_id'	=>	1,
				'title'			=> 	'What programming languages is the best for web development?',
				'body'			=>	'Hello syow',
				'tags'			=>	'hello',
				'sticky'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime,
			),

			array(
				'id'			=>	2,
				'user_id'		=>	2,
				'post_type_id'	=>	2,
				'category_id'	=>	2,
				'title'			=>	'What PHP framework is the fastest?',
				'body'			=>	'Hello syow',
				'tags'			=>	'hello',
				'sticky'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime,
			),

			array(
				'id'			=>	3,
				'user_id'		=>	3,
				'post_type_id'	=>	3,
				'category_id'	=>	3,
				'title'			=>	'Critics and Suggestions for my noobness',
				'body'			=>	'Hello syow',
				'tags'			=>	'hello',
				'sticky'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime,
			),

			array(
				'id'			=>	4,
				'user_id'		=>	1,
				'post_type_id'	=>	2,
				'category_id'	=>	2,
				'title'			=>	'Does anybody know which tutorial should I follow?',
				'body'			=>	'Hello syow',
				'tags'			=>	'hello',
				'sticky'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime,
			),

			array(
				'id'			=>	5,
				'user_id'		=>	1,
				'post_type_id'	=>	2,
				'category_id'	=>	3,
				'title'			=>	'Laravel is showing errors and I dunn know what to do',
				'body'			=>	'Hello syow',
				'tags'			=>	'hello',
				'sticky'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime,
			),

			array(
				'id'			=>	6,
				'user_id'		=>	1,
				'post_type_id'	=>	3,
				'category_id'	=>	3,
				'title'			=>	'Laravel vs CodeIgniter',
				'body'			=>	'Hello syow',
				'tags'			=>	'hello',
				'sticky'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime,
			),

			array(
				'id'			=>	7,
				'user_id'		=>	2,
				'post_type_id'	=>	1,
				'category_id'	=>	1,
				'title'			=>	'Jeff Pilgrim vs the world',
				'body'			=>	'Hello syow',
				'tags'			=>	'hello',
				'sticky'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime,
			),

			array(
				'id'			=>	8,
				'user_id'		=>	2,
				'post_type_id'	=>	1,
				'category_id'	=>	3,
				'title'			=>	'What does this operator do?',
				'body'			=>	'Hello syow',
				'tags'			=>	'hello',
				'sticky'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime,
			),

			array(
				'id'			=>	9,
				'user_id'		=>	3,
				'post_type_id'	=>	1,
				'category_id'	=>	2,
				'title'			=>	'For Web Developers out there!',
				'body'			=>	'Hello syow',
				'tags'			=>	'hello',
				'sticky'		=>	0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime,
			),

			array(
				'id'			=>	10,
				'user_id'		=>	3,
				'post_type_id'	=>	2,
				'category_id'	=>	1,
				'title'			=>	'Hello World',
				'body'			=>	'Hello syow',
				'tags'			=>	'hello',
				'sticky'		=>	 0,
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime,
			),

			
		);

		DB::table('posts')->insert($posts);
	}
	
}