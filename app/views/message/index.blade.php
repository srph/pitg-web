@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
				<a href="#" class="list-group-item active">Messages<span class="badge">{{ Message::countUnread() }}</span></a>
				<a href="{{ URL::route('account_settings') }}" class="list-group-item" id="sidebar" role="navigation">Account Settings</strong></a>
				<a href="{{ URL::route('profile_settings') }}" class="list-group-item" id="sidebar" role="navigation">Profile Settings</a>
			</div> {{-- ./list-group --}}
		</div>{{-- ./col-md-3 --}}

		<div class="col-md-9">
			<h2> Inbox </h2>

			<hr>

			@include('alert')

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<td>
						<td> Title</td>
						<td> Sender</td>
						<td>
					</tr>
				</thead>

				<tbody>
					@foreach($messages as $message)
						<tr>
							<td>
								@if($message->read)
									<span class="glyphicon glyphicon-envelope"></span>
								@else
									<span class="glyphicon glyphicon-bookmark"></span>
								@endif
							</td>
							<td> <a href="{{ URL::route('message.show', $message->id) }}"> {{{ $message->title }}} </a> </td>
							<td> <a href="{{ URL::route('profile', $message->user->id) }}">{{{ $message->user->username }}} </a> </td>
							<td>
								<a href="#"> <span class="glyphicon glyphicon-trash"></span> </a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{ $messages->links() }}
		</div>{{-- /.col-md-9 --}}
	</div>{{-- /.row --}}
@stop

@section('scripts')
@stop