<?php

class LoginController extends BaseController {

	/**
	 * Apply a filter to all instance of this controller
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->beforeFilter('guest');
		$this->beforeFilter('csrf', array('only' => array('postLogin')));
	}

	/**
	 * Display the login form
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return View::make('account/login')
			->with('title', 'Login');
	}

	/**
	 * Attempt to login the user
	 *
	 * @return Response
	 */
	public function postLogin()
	{
		try {
			$user = array(
				'email'		=>	Input::get('email'),
				'password'	=>	Input::get('password')
			);

			// If authentication is successful
			if(Sentry::authenticate($user, false)) {
				// Flash a success message and redirect the user to the posts page
				Session::flash('success', 'You have been logged in successfully!');
				return Redirect::route('post.index');
			}
		} catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
			Session::flash('error', 'Login field is required.');
		} catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
			Session::flash('error', 'Password field is required.');
		} catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
			Session::flash('warning', 'Wrong password, try again.');
		} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
			Session::flash('error', 'User was not found.');
		} catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
			Session::flash('error', 'User is not activated.');
		}

		// Otherwise, show errors
		return Redirect::route('login')->withInput();
	}

	/**
	 * Logout a logged in user
	 *
	 * @return Response
	 */
	public function logout()
	{
		Sentry::logout();
		return Redirect::route('home');
	}
}