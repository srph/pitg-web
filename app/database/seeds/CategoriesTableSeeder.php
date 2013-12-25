<?php

class CategoriesTableSeeder extends Seeder {
	
	public function run()
	{

		DB::table('categories')->delete();

		$categories = array(

			array(
				'id'	=>	1,
				'title'	=>	'Programming',
			),

			array(
				'id'	=>	2,
				'title'	=>	'Web Design',
			),

			array(
				'id'	=>	3,
				'title'	=>	'Web Development',
			),

			array(
				'id'	=>	4,
				'title'	=>	'PHP',
			),
			
		);

		DB::table('categories')->insert($categories);
	}
	
}