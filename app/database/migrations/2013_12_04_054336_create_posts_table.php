<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('post_type_id');
			$table->integer('category_id');
			$table->string('title');
			$table->text('body');
			$table->string('tags')->nullable();
			$table->boolean('sticky')->default(0);
			$table->boolean('closed')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}