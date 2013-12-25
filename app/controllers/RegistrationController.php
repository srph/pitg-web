<?php

class RegistrationController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('guest', array('only' => array('getR4+')));
		$this->beforeFilter('csrf', array('only' => array('postRegister')));
	}

	/**
	 * Display the registration form
	 *
	 * @link register
	 * @return Response
	 */
	public function getRegister()
	{
		return View::make('account/register')
			->with('title', 'Register');
	}

	/**
	 * Validate and store the information
	 * passed by the end-user
	 *
	 * @return Response
	 */

	public function postRegister()
	{
		try {
			$registered = Sentry::register(array(
				'email'			=>	Input::get('email'),
				'username'		=>	Input::get('username'),
				'password'		=>	Input::get('password'),
				'first_name'	=>	Input::get('first_name'),
				'last_name'		=>	Input::get('last_name'),
				'created_at'	=>	new DateTime,
				'updated_at'	=>	new Datetime
			));

			if($registered) {
				$activate = "A verification code has been sent to your address to validate your account.";
				Session::flash('success', 'You have succesfully created an account! ' . $activate);
				//return Response::json(array('status' => true));
				return Redirect::route('post.index');
			}
		} catch(Cartalyst\Sentry\Users\LoginRequiredException $e) {
			Session::flash('error', "Login field is required.");
		} catch(Cartalyst\Sentry\Users\PasswordRequiredException $e) {
			Session::flash('error', "Password field is required.");
		} catch(Cartalyst\Sentry\Users\UserExistsException $e) {
			Session::flash('warning', "User with this email already exists");
		}
			//return Response::json(array('status' => false));
			return Redirect::route('register');

	}
};