@extends('master')

@section('content')

	@include('alert')

	<ol class="breadcrumb">
		<li><a href="#"> Posts </a></li>
		<li class="active">All</li>
	</ol>

	<div class="row">

		<div class="col-md-3">
			<div class="list-group" role="navigation">
				<a class="list-group-item"><strong>Categories</strong></a>
				<a href="#" class="list-group-item">All</a>
				@foreach(Category::all() as $category)
					<a href="#" class="list-group-item">
						{{ $category->title }}
					</a>
				@endforeach
			</div> {{-- ./list-group --}}
		</div>{{-- ./col-md-3 --}}


		<div class="col-md-9">

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<td> </td>
						<td> Title </td>
						<td> Posted By </td>
						<td> Last Reply </td>
					</tr>
				</thead>

				<tbody>
					@foreach($posts as $post)
						<tr>
							<td><span class="glyphicon glyphicon-question-sign"></span></td> {{-- Post Type Icon --}}
							<td><a href="{{ URL::route('post.show', $post->id) }}">{{{ $post->title }}}</a></td>
							<td><a href="{{ URL::route('profile', $post->user->id) }}">{{{ $post->user->username }}}</a></td>
							<td>
								@if(count($post->replies) >= 1)
									{{ $post->carbonDate($post->replies()->orderBy('created_at', 'desc')->first()->created_at) }}
								@else
									-
								@endif
							</td>

						</tr>
					@endforeach
				</tbody>
			</table>

			{{-- Pagination --}}
			{{ $posts->links() }}

		</div> {{-- /.col-md-8 --}}

	</div> {{-- /.row --}}
@stop

@section('scripts')
	<script>
		$('a').on('click', function() {
			$.ajax({

			});
		});
	</script>
@stop