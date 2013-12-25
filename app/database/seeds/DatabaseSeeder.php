<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$this->call('UsersTableSeeder');
		$this->command->info('Users seeded!');

		$this->call('RepliesTableSeeder');
		$this->command->info('Replies seeded!');

		$this->call('PostsTableSeeder');
		$this->command->info('Posts seeded!');

		$this->call('PostTypesTableSeeder');
		$this->command->info('Post Types seeded!');

		$this->call('CategoriesTableSeeder');
		$this->command->info('Categories seeded!');

		$this->call('MessagesTableSeeder');
		$this->command->info('Messages seeded!');
	}

}