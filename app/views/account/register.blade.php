@extends('static')

@section('content')
	@include('alert')
		
	<div class="panel panel-default">

		<div class="panel-heading">
			<h2 class="text-center"> <strong> Create an account </strong> </h2>
		</div>

		<div class="panel-body">

			<h3 class="text-center"> Account Credentials </h3> <br />
			{{ Form::open(array('route' => 'register', 'action' => 'POST', 'role' => 'form')) }}
				{{ Form::token() }}

				{{ Form::email('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}

				{{ Form::text('username', Input::old('username'), array('placeholder' => 'Username', 'class' => 'form-control')) }}
				
				{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}

				<hr>

				<h4 class="text-center"> Personal Information </h4> <br />

				<div class="row">
					<div class="col-md-6">
						{{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'First Name', 'class' => 'form-control')) }}
					</div>

					<div class="col-md-6">
						{{ Form::text('last_name', Input::old('last_name'), array('placeholder' => 'Last Name', 'class' => 'form-control')) }}
					</div>
				</div>

				{{ Form::submit('Create account!', array('class' => 'btn btn-primary btn-block'))}}

			{{ Form::close()}}
		</div>

		<div class="panel-footer">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<a href="#"> Forgot your password? </a>
		</div>

	</div>
@stop

@section('scripts')
	<script>
		//$('input')
	</script>
@stop