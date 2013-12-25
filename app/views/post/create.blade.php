@extends('master')

@section('content')
	{{ Form::open(array('route' => 'post.store', 'action' => 'POST', 'role' => 'form')) }}
		{{ Form::token() }}

		{{-- Title --}}
		<div class="form-group">
			<label for="title"> Title </label>
			{{ Form::text('title', NULL, array('class' => 'form-control'))}}
		</div>

		{{-- Post Type --}}
		<div class="form-group">
			<label for="post_type"> Post Type </label>
			<select name="post_type_id" class="form-control">
				@foreach(PostType::all() as $type)
					<option value="{{ $type->id }}"> {{ $type->title }} </option>
				@endforeach
			</select>
		</div>

		{{-- Category --}}
		<div class="form-group">
			<label for="category_id"> Category </label>
			<select name="category" class="form-control">
				@foreach(Category::all() as $category)
					<option value="{{ $category->id }}"> {{ $category->title }} </option>
				@endforeach
			</select>
		</div>

		{{-- Body --}}
		<div class="form-group">
			<label for="body"> Body </label>
			{{ Form::textarea('body', NULL, array('class' => 'form-control'))}}
		</div>

		{{ Form::submit('Post', array('class' => 'btn btn-primary'))}}
		<a href="#"><div class="btn btn-default">Preview</div></a>
	{{ Form::close()}}
@stop