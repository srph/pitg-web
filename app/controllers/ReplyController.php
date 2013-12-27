<?php

class ReplyController extends BaseController {

	/**
	 * Apply a filter to all instance of this controller
	 *
	 * @return 	void
	 */
	public function __construct()
	{
		$this->beforeFilter('auth');
		$this->beforeFilter('csrf', array('only' => array('store', 'update')));
	}

	/**
	 * Store the answer submitted by the user
	 *
	 * @return 	Response
	 */
	public function store()
	{
		// Store the submitted reply to the database
		$reply = new Reply;
		$reply->user_id = Sentry::getUser()->id;
		$reply->post_id = Input::get('post_id');
		$reply->body = Input::get('body');
		$reply->created_at = new DateTime;
		$reply->updated_at = new DateTime;

		// If the reply was stored succesfully
		if($reply->save()) {
			Session::flash('success', 'You have submitted your reply successfully!');
			return Redirect::to(URL::route('post.show', $reply->post_id) . '#' . $reply->id );
		}

		// Otherwise, redirect to the form and show errors
		return Redirect::to(URL::route('post.show', $reply->post_id) . '#reply')
			->withInput()
			->withErrors($reply->errors());
	}

	/**
	 * Display the form to edit the specified resource
	 *
	 * @param 	int 	$id
	 * @return 	Response
	 */
	public function edit($id)
	{
		return View::make('post.reply.edit')
			->with(array(
				'title'		=>	'Edit Reply',
				'reply'		=>	Reply::find($id)
			));
	}

	/**
	 * Update the specifed resource
	 *
	 * @param 	int 	$id
	 * @return 	Response
	 */
	public function update($id)
	{
		$reply = Reply::find($id);

		// Update
		$reply->body = Input::get('body');
		$reply->updated_at = new DateTime;

		// If the specified resource was updated succesfully
		// Flash a message and redirect to the post
		if($reply->save()) {
			Session::flash('success', 'Your reply was updated successfully.');
			return Redirect::route('post.show', $reply->post->id);
		}

		// Otherwise, return the user to the editing page with errors
		Session::flash('error', 'An error has occured while updating your reply');
		return Redirect::route('post.show', $reply->post->id)
			->withErrors($reply->errors());
	}

	/**
	 * Delete the specified resource
	 *
	 * @param 	int 	$id
	 * @return 	Response
	 */
	public function destroy($id)
	{
		$reply = Reply::find($id);

		// If the reply does not belong to the logged in user
		// Return the user to the post
		if($reply->user->id !== Sentry::getUser()->id) return Response::json(array('status' => false));

		// If the reply was deleted succesfully from the database
		// Flash a success message then return the user to its respective post
		if($reply->delete()) {
			Session::flash('success', 'You have successfully deleted the reply');
			return Response::json(array('status' => true));
		}

		// Otherwise, flash an error and return the user to its respective post
		Session::flash('error', 'An error has occured while deleting the post');
		return Response::json(array('status' => false));
	}
}