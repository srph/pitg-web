@extends('master')

@section('content')

	<div class="row">

		<div class="col-md-3">
			<div class="list-group">
				<a href="{{ URL::route('message.index') }}" class="list-group-item">Messages<span class="badge">{{ Message::countUnread() }}</span></a>
				<a href="#" class="list-group-item active" id="sidebar" role="navigation">Account Settings</strong></a>
				<a href="{{ URL::route('profile_settings') }}" class="list-group-item" id="sidebar" role="navigation">Profile Settings</a>
			</div> {{-- ./list-group --}}
		</div>{{-- ./col-md-3 --}}

		<div class="col-md-9">
			<h2> Account Settings </h2>

			<hr>

			@include('alert')

			{{ Form::open(array('class' => 'form-horizontal', 'method' => 'PUT')) }}
				{{ Form::token() }}

				{{-- Email Address --}}
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label"> Email Address </label>

					<div class="col-sm-10">
						{{ Form::email('email', $user->email, array('id' => 'email' , 'class' => 'form-control')) }}
					</div>
				</div>
				<span class="help-block">Changing your email address will require you to re-validate your account using your new email.</span>

				<hr>

				{{-- Current Password --}}
				<div class="form-group">
					<label for="current_password" class="col-sm-2 control-label"> Current password </label>

					<div class="col-sm-10">
						{{ Form::password('current_password', array('class' => 'form-control')) }}
					</div>
				</div>

				<span class="help-block">Enter your current password to update your account</span>

				<div class="form-group">
					<label for="new_password" class="col-sm-2 control-label"> New password </label>

					<div class="col-sm-10">
						{{ Form::password('new_password', array('class' => 'form-control', 'disabled' => 'disabled')) }}
					</div>
				</div>


				<div class="form-group">
					<label for="new_password_confirmation" class="col-sm-2 control-label"> Confirm new password </label>

					<div class="col-sm-10">
						{{ Form::password('new_password_confirmation', array('class' => 'form-control', 'disabled' => 'disabled')) }}
					</div>
				</div>

				<hr>

				{{ Form::submit('Update account', array('class' => 'btn btn-success'))}}

			{{ Form::close() }}

		</div> {{-- /.col-md-9 --}}

	</div> {{-- /.row --}}
@stop

@section('scripts')
	<script>
		var current_password = $('input[name=current_password'),
			new_password = $('input[name=new_password], input[name=new_password_confirmation');

		current_password.on('click', function() {
			new_password.removeAttr('disabled');
		});
	</script>
@stop