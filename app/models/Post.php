<?php

/**
 * A model class for posts
 *
 * @uses 	posts
 */

use Carbon\Carbon;
use LaravelBook\Ardent\Ardent;

class Post extends Ardent {

	/**
	 * Ardent validation rules
	 */
	// public static $rules = array(
	// 	'post_type_id'	=>	'exists:post_types,id',
	// 	'category_id'	=>	'exist:categories,id',
	// 	'title'		=>	'required|between:6,48|alpha_dash',
	// 	'body'		=>	'required|between:12,12000',
	// 	'tags'		=>	'alpha_dash'
	// );

	/**
	 * The database table used by the model
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * Columns fillable by the model
	 *
	 * @var array
	 */
	protected $fillable = array('user_id', 'post_type_id', 'category_id', 'title', 'body', 'tags', 'sticky');

	/**
	 * Set to allow the model to recognize the default timestamps
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * Return a readable format using Carbon
	 *
	 * @param 	date 	$date
	 * @return 	string
	 */
	public function carbonDate($date)
	{
		$date = new Carbon($date);	// Create a new instance of carbon
		return $date->diffForHumans();	// Return a formatted date
	}
	
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function postType()
	{
		return $this->belongsTo('PostType');
	}

	public function category()
	{
		return $this->belongsTo('Category');
	}

	public function replies()
	{
		return $this->hasMany('Reply');
	}


	/**
	* Generates permalink
	*
	* @param string $str
	* @return string
	**/

	function createPermalink()
	{
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $this->title);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);

		$this->permalink = $clean;
		$this->save();
	}
}