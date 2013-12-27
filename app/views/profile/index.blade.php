@extends('master')

@section('content')
	<div class="row">

		{{-- Profile --}}
		<div class="col-md-3">
			<img class="img-rounded" alt="{{ $user->username }}'s img" width="220" height="220" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC" />

			<h3> <strong> {{{ $user->first_name }}} {{{ $user->last_name }}} </strong> </h3>
			<h4> {{{ $user->username }}} </h4>

			<hr>

			<h5> <span class="glyphicon glyphicon-map-marker"></span> Philippines </h5>
			<h5> <span class="glyphicon glyphicon-time"> </span> Joined on {{ date('F j, Y', strtotime($user->created_at)) }} </h5>

			<hr>

		</div>{{-- /.col-md-3 --}}

		{{-- Tabs --}}
		<div class="col-md-9">
			<ul id="profile" class="nav nav-tabs">
				<li class="active">
					<a href="#posts" data-toggle="tab">
						Recent Posts
					</a>
				</li>

				<li>
					<a href="#replies" data-toggle="tab">
						Recent Replies
					</a>
				</li>
			</ul> 

			<div class="tab-content">
				<div class="tab-pane fade in active" id="posts">

					@if(count($posts) >= 1)
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<td> </td>
									<td> Title </td>
									<td> Date posted </td>
								</tr>
							</thead>
							
							<tbody>
								@foreach($posts as $post)
									<tr>
										<td><span class="glyphicon glyphicon-question-sign"></span></td> {{-- Post Type Icon --}}
										<td><a href="{{ URL::route('post.show', $post->id) }}">{{{ $post->title }}}</a></td>
										<td>
											@if(count($post->replies) >= 1)
												{{ $post->carbonDate($post->created_at) }}
											@else
												-
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						@else
							<br />
							<div class="alert alert-warning">
								<p> This user has not yet submitted a post </p>
							</div>
						@endif
					</table>

				</div> {{-- /.tab-pane /#posts --}}

				<div class="tab-pane fade" id="replies">
					<h1> Replies </h1>
				</div> {{-- /.tab-pane /#replies --}}				
			</div> {{-- /.tab-content --}}
		</div> {{-- /.col-md-9 --}}

	</div> {{-- /.row --}}
@stop