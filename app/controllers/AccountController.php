<?php

class AccountController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
		$this->beforeFilter('csrf', array('only' => array('updateAccount')));
	}

	/**
	 * Display the general account settings of the user
	 *
	 * @link 	panel/index
	 */
	public function getAccount()
	{
		return View::make('account.settings')->with(array(
			'title' => 'Account Settings',
			'user'	=>	Sentry::getUser()
		));
	}

	/**
	 * Update the general account settings of the user
	 *
	 * @link 	panel/index
	 */
	public function updateAccount()
	{
		$user = Sentry::getUser();

		// How do I implement Ardent with this one?
		// TODO: Ardent

		// Update user details
		$user->email = Input::get('email');
		$user->password = Input::get('new_password');

		// If the user was updated successfully, flash a success message
		// and redirect him back to the account settings page
		if ($user->save()) {
			Session::flash('success', 'Your account was updated successfully!');
			return Redirect::route('account_settings');
		}

		// Otherwise, flash an error
	 	Session::flash('error', 'An error has occured while processing your request');
	 	return Redirect::route('account_settings');

	}
}