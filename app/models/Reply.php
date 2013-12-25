<?php

/**
 * A model class for post replies
 *
 * @uses 	replies
 */

use Carbon\Carbon;
use LaravelBook\Ardent\Ardent;

class Reply extends Ardent {

	/**
	 * Ardent validation rules
	 */
	public static $rules = array(
		'body'		=>	'required|between:10,10000'
	);

	/**
	 * The database table used by the model
	 *
	 * @var string
	 */
	protected $table = 'replies';

	/**
	 * Columns fillable by the model
	 *
	 * @var array
	 */
	protected $fillable = array('post_id', 'user_id', 'body');

	/**
	 * Set to allow the model to recognize the default timestamps
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * Fetch the title of requested resource
	 *
	 * @param 	int 	$id
	 * @return 	string
	 */
	public static function getTitle($id)
	{
		$reply = self::find($id);
		return $reply->title;
	}

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

	public function post()
	{
		return $this->belongsTo('Post');
	}
}