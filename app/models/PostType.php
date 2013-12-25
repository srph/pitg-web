<?php

/**
 * A model class for post types
 *
 * @uses 	post_types
 */

class PostType extends Eloquent {

	/**
	 * The database table used by the model
	 *
	 * @var string
	 */
	protected $table = 'post_types';

	/**
	 * Columns fillable by the model
	 *
	 * @var array
	 */
	protected $fillable = array('title', 'description');

	public function posts()
	{
		return $this->hasMany('Post');
	}
	
}