<?php

/**
 * A model class for post categories
 *
 * @uses 	categories
 */

class Category extends Eloquent {

	/**
	 * The database table used by the model
	 *
	 * @var string
	 */
	protected $table = 'categories';

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