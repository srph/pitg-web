<?php

class Message extends Eloquent {
	
	/**
	 * The database table used by the model
	 *
	 * @var string
	 */
	protected $table = 'messages';

	/**
	 * Columns fillable by the model
	 *
	 * @var array
	 */
	protected $fillable = array('user_id', 'title', 'body', 'read', 'created_at', 'updated_at');

	/**
	 * Set to allow the model to recognize the default timestamps
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * Count the user's number of unread messages
	 *
	 * @return 	int
	 */
	public static function countUnread()
	{
		$unread = self::where('recepient_id', '=' , Sentry::getUser()->id)
			->where('read', '=', 0)
			->get();

		return count($unread);
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}