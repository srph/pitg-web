<?php

class PostController extends BaseController {

	/**
	 * Apply a filter to all instance of this controller
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => array('index', 'show')));
		$this->beforeFilter('csrf', array('only' => array('store', 'update')));
	}

	/**
	 * Display the posts
	 *
	 * @return 	Response
	 */
	public function index()
	{
		return View::make('post.index')
			->with(array(
				'title'		=>	'Recent posts',
				'posts'		=>	Post::orderBy('created_at', 'desc')->paginate(10)
			));
	}

	/**
	 * Display the form to create a new post
	 *
	 * @return 	Response
	 */
	public function create()
	{
		return View::make('post.create')
			->with('title', 'Create a new post!');
	}

	/**
	 * Store the post submitted by the user
	 *
	 * @return 	Response
	 */
	public function store()
	{		
		// Create the post and store it to the database
		$post = new Post;
		$post->title = Input::get('title');
		$post->user_id = Sentry::getUser()->id;
		$post->post_type_id = Input::get('post_type_id');
		$post->category_id = Input::get('category');
		$post->body = Input::get('body');

		// If the post was stored succesfully
		if($post->save()) {
			$post->createPermalink();
			// Session::flash('success', 'Your post has been successfully created');
			return Redirect::route('post.show', $post->permalink);	// Return user to the home page
		}

		// Otherwise, return him to the create post page with errors
		// Session::flash('error', 'An error occured while creating your post, please try again.');
		return Redirect::route('create')
			->withErrors($post->errors());// Return to the creation page with errors
	}

	/**
	 * Display the specified resource
	 *
	 * @param 	int 	$id
	 * @return 	Response
	 */
	public function show($permalink)
	{
		$post = Post::where('permalink', $permalink)->first();

		return View::make('post.show')
			->with(array(
				'title'		=>	$post->title,
				'post'		=>	$post
			));
	}

	/**
	 * Display the form to edit the specified resource
	 *
	 * @param 	int 	$id
	 * @return 	Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);

		return View::make('post.edit')
			->with(array(
				'title'		=>	'Edit -' . $post->title,
				'post'		=>	$post
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
		$post = Post::find($id);
		// If the post does not belong to the logged in user
		// Return the user to the home page
		if($post->user->id !== Sentry::getUser()->id) return Redirect::route('home');

		// Update
		$post->title = Input::get('title');
		$post->post_type_id = Input::get('post_type_id');
		$post->category_id = Input::get('category_id');
		$post->body = Input::get('body');

		// If the specified resource was updated succesfully
		// Flash a success message and redirect him to the post
		if($post->save()) {
			Session::flash('success', 'Your post was updated succesfully');
			return Redirect::route('post.show', $id);
		}

		// Otherwise, redirect the user back to the editing page
		// and show errors
		Session::flash('error', 'An error has occured while updating the post');
		return Redirect::route('post.edit', $id)
			->withErrors($post->errors());
	}

	/**
	 * Delete the specified resource
	 *
	 * @param 	int 	$id
	 * @return 	Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		
		// If the post does not belong to the logged in user
		// Return the user to the home page
		if($post->user->id !== Sentry::getUser()->id) return Response::json(array('status' => false));

		// If the post was deleted succesfully from the database,
		// Flash a success message and redirect him to the post index
		if($post->delete()) {
			Session::flash('success', 'You have successfully deleted the post');
			return Response::json(array('status' => true));
		}

		// Otherwise, return him back to the post, and flash an error
		Session::flash('error', 'An error has occured while deleting the post');
		return Response::json(array('status' => false));
	}
}