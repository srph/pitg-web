@extends('master')

@section('content')
	<div class="row">

		<div class="col-md-3">
			<div class="list-group">
				<a href="{{ URL::route('message.index') }}" class="list-group-item">Messages<span class="badge">{{ Message::countUnread() }}</span></a>
				<a href="{{ URL::route('account_settings') }}" class="list-group-item" id="sidebar" role="navigation">Account Settings</strong></a>
				<a href="#" class="list-group-item active" id="sidebar" role="navigation">Profile Settings</a>
			</div> {{-- ./list-group --}}
		</div>{{-- ./col-md-3 --}}

		<div class="col-md-9">
			{{ Form::open(array('route' => 'profile_settings', 'method' => 'PUT')) }}
				{{ Form::token() }}
				<h2> Profile Settings </h2>

				<hr>

				<div class="row">
					<div class="col-md-6">
						{{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'First Name', 'class' => 'form-control'))}}
					</div>

					<div class="col-md-6">
						{{ Form::text('last_name', Input::old('last_name'), array('placeholder' => 'Last Name', 'class' => 'form-control'))}}
					</div>
				</div>

				<hr>

				{{ Form::submit('Update profile', array('class' => 'btn btn-success'))}}
			{{ Form::close() }}
		</div> {{-- /.col-md-9 --}}

	</div> {{-- /.row --}}
@stop

@section('scripts')
@stop