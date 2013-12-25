<?php

/**
 * A model class for usres
 *
 * @uses 	users
 */

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/** 
	 * Columns fillable by the model
	 *
	 * @var array
	 */
	protected $fillable = array(
		'email',
		'password',
		'permissions',
		'activated',
		'activation_code',
		'last_login',
		'reset_password_code',
		'first_name',
		'last_name',
		'created_at',
		'updated_at'
	);

	/**
	 * Set to allow the model to recognize the default timestamps
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function messages()
	{
		return $this->hasMany('Message');
	}

	public function posts()
	{
		return $this->hasMany('Post');
	}

	public function replies()
	{
		return $this->hasMany('Reply');
	}

}