<?php

class MessageController extends BaseController {

	/**
	 * Apply a filter to all instance of this controller
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->beforeFilter('auth');
		$this->beforeFilter('csrf', array('only' => array('store')));
	}

	/**
	 * Display the user's inbox
	 *
	 * @return 	Response
	 */
	public function index()
	{
		return View::make('message.index')
			->with(array(
				'title'			=>	'Inbox',
				'messages'		=>	Message::where('recepient_id', '=', Sentry::getUser()->id)->paginate(10)
			));
	}

	/**
	 * Display the form to create a new post
	 *
	 * @return 	Response
	 */
	public function create()
	{
		return View::make('message.create')
			->with('title', 'Compose a new message!');
	}

	/**
	 * Store the post submitted by the user
	 *
	 * @return 	Response
	 */
	public function store()
	{		

	}

	/**
	 * Display the specified resource
	 *
	 * @param 	int 	$id
	 * @return 	Response
	 */
	public function show($id)
	{
		$message = Message::find($id);

		return View::make('message.show')
			->with(array(
				'title'			=>	$message->title,
				'message'		=>	$message
			));
	}

	/**
	 * Delete the specified resource
	 *
	 * @param 	int 	$id
	 * @return 	Response
	 */
	public function destroy($id)
	{
		//
	}
}