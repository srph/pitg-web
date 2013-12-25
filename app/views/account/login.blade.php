@extends('static')

@section('content')
	@include('alert')
		
	<div class="panel panel-default">

		<div class="panel-heading">
			<h2 class="text-center"> <strong> Welcome, User </strong> </h2>
		</div>

		<div class="panel-body">
			{{ Form::open(array('route' => 'login', 'action' => 'POST', 'role' => 'form')) }}
				{{ Form::token() }}

				{{ Form::email('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
				{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}

				<div class="checkbox">
					<label>
						{{ Form::checkbox('rememberme', 0, 'false')}}
						Remember Me
					</label>
				</div>

				{{ Form::submit('Login', array('class' => 'btn btn-primary btn-block'))}}

			{{ Form::close()}}
		</div>

		<div class="panel-footer">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<a href="#"> Forgot your password? </a>
		</div>

	</div>
@stop