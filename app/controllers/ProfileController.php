<?php

class ProfileController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('csrf', array('only' => array('postSettings')));
		$this->beforeFilter('auth', array('except' => array('getProfile')));
	}

	/**
	 * Display the form to update the logged in user's profile
	 *
	 * @return Response
	 */
	public function getSettings()
	{
		return View::make('profile.settings')
			->with(array(
				'title'		=>	'Profile',
				'user'		=>	Sentry::getUser()
			));
	}

	/**
	 * Update the user's profile
	 *
	 * @param 	int 	$id
	 * @return Response
	 */
	public function postSettings()
	{
		//
	}


	/**
	 * Display a requested user's profile
	 *
	 * @param 	int 	$id
	 * @return Response
	 */

	public function getProfile($id)
	{
		$user = User::find($id);

		return View::make('profile.index')
			->with(array(
				'title'		=>	$user->username . ' (' . $user->first_name .')',
				'user'		=>	$user,
				'posts'		=>	$user->posts()->orderBy('created_at', 'desc')->take(5)->get(),
				'reply'		=>	$user->replies
			));
	}
}