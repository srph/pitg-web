@extends('master')

@section('content')

	<ol class="breadcrumb">
		<li><a href="{{ URL::route('post.index') }}">Posts</a></li>
		<li><a href="#">{{ $post->category->title }}</a></li>
		<li class="active">Topic</li>
	</ol>

	@include('alert')

	{{-- Post --}}

	<div class="row">

		<div class="col-md-2">
			<img class="img-rounded" alt="{{ $post->user->username }}'s img" width="140" height="140" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC" />
		</div>

		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{{ $post->title }}}
				</div>

				<div class="panel-body">
					{{ Parsedown::instance()->parse($post->body) }}
				</div>
				
				<div class="panel-footer">
					<a href="#{{ $post->user->id }}"> <span class="glyphicon glyphicon-link"></span> </a>
					@if(Sentry::check() && $post->user->id == Sentry::getUser()->id)
							<a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
							<a class="delete-post" href="#" data-id="{{ $post->id }}">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
					@endif
					<a href="{{ URL::route('profile', $post->user->id) }}">{{{ $post->user->username }}}</a> posted this {{ $post->carbonDate($post->created_at) }}
				</div>

			</div> {{-- /.panel panel-default --}}
		</div> {{-- /.col-md-10 --}}

	</div> {{-- /.row --}}

	{{-- Reply --}}

	@foreach($post->replies as $reply)
		<div class="row">

			<div class="col-md-2">
				<img class="img-rounded" alt="{{ $post->user->username }}'s img" width="100" height="100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC" />
			</div>

			<div class="col-md-10">
				<div id="{{ $reply->id }}"class="panel panel-default">

					<div class="panel-body">
						{{ Parsedown::instance()->parse($reply->body) }}
					</div>

					<div class="panel-footer">
						<a href="#{{ $reply->id }}"> <span class="glyphicon glyphicon-link"></span> </a>
						@if(Sentry::check() && $reply->user->id == Sentry::getUser()->id)
							<a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
							<a class="delete-reply" href="#" data-id="{{ $reply->id }}">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						@endif

						Replied by <a href="{{ URL::route('profile', $reply->user->id) }}"> {{{ $reply->user->username }}} </a> {{ $reply->carbonDate($reply->created_at) }}
					</div>

				</div> {{-- /.panel panel-default --}}

			</div> {{-- /.col-md-10 --}}

		</div> {{-- /.row --}}
	@endforeach

	@include('alert')

	{{-- Reply textarea --}}

	@if(!Sentry::check())
		<div class="alert alert-warning">
			<p> You have to be <a href="#">signed in</a> to post a reply! </p>
		</div>
	@else

		<h2> Reply to this post </h2>
		@if($errors->has('body'))
			<div class="alert alert-warning">
				<p>{{ $errors->first('body')}} </p>
			</div>
		@endif
		{{ Form::open(array('route' => array('post.{post_id}.reply.store', $post->id), 'method' => 'POST', 'id' => 'reply')) }}
			<p> {{ Form::textarea('body', NULL, array('class' => 'form-control')) }} </p>
			<p> {{ Form::submit('Reply', array('class' => 'btn btn-primary'))}} </p>
		{{ Form::close() }}
	@endif

@stop

@section('scripts')
	<script src="{{ URL::asset('js/bootbox.min.js') }}"></script>

	<script>
		/**
		 * Delete a reply
		 */
		$('.delete-reply').on('click', function() {
			var $this = $(this);
			bootbox.confirm("Are you sure to delete this reply?", function(result) {
				if(result) {
					$.ajax({
						url: " {{ url('reply') }}/" + $this.data('id'),
						type: 'DELETE',
						success: function(data) {
							if(data.status) {
								location.reload();
							}
						},
						dataType: 'json'
					});
				}
			});
			return false;
		});

		/**
		 * Delete a post
		 */
		$('.delete-post').on('click', function() {
			var $this = $(this);
			bootbox.confirm("Are you sure to delete this post?", function(result) {
				if(result) {
					$.ajax({
						url: " {{ url('post') }}/" + $this.data('id'),
						type: 'DELETE',
						success: function(data) {
							if(data.status) {
								window.location.replace("{{ url('post') }}");
							}
						},
						dataType: 'json'
					});
					console.log('yes');
				}
			});
			return false;
		});
	</script>

@stop