<!DOCTYPE html>
<html lang="en">
<head>
	<title> Pinoy I.T. Geeks - {{ $title }} </title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/stylesheet.css') }}" />
	<link rel="stylesheet" media="screen" href="{{ URL::asset('css/bootstrap.min.css') }}" />
</head>

<body>

	<div class="navbar navbar-default">
		<div class="container">

			<a class="navbar-brand" href="#"> Philippine IT Geeks </a>
			
			<ul class="nav navbar-nav">
				<li> <a href="{{ URL::route('home') }}"> Home </a> </li>
				<li> <a href="{{ URL::route('about') }}"> About </a> </li>
				<li> <a href="{{ URL::route('post.index') }}"> Posts </a> </li>
				<li> <a href="http://hakz.co"> IRC </a> </li>
			</ul>	

			<ul class="nav navbar-nav navbar-right">
				@if(Sentry::check())		
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

							

							{{ Sentry::getUser()->username }} <b class="caret"></b>
						</a>

						<ul class="dropdown-menu">
							<li><a href="{{ URL::route('profile', Sentry::getUser()->id) }}"><span class="glyphicon glyphicon-user"></span> Profile</a> </li>
							<li> <a href="{{ URL::route('message.index') }}"> <span class="glyphicon glyphicon-envelope"></span> Messages </a> </li>
							<li class="divider"></li>
							<li><a href="{{ URL::route('account_settings') }}"><span class="glyphicon glyphicon-lock"></span> Account Settings</a> </li>
							<li><a href="{{ URL::route('profile_settings') }}"><span class="glyphicon glyphicon-cog"></span> Profile Settings</a> </li>
							<li class="divider"></li>
							<li><a href="{{ URL::route('logout') }}"><span class="glyphicon glyphicon-remove"></span> Logout</a></li>
						</ul> {{-- /ul .dropdown-menu --}}
					</li> {{-- /li .dropdown --}}
				@else
					<li> <a href="{{ URL::route('login') }}" data-toggle="modal" data-target="#loginModal">Login</a> </li>
					<li> <a href="{{ URL::route('register') }}" data-toggle="modal" data-target="#registerModal">Register</a> </li>
				@endif
			</ul> {{-- /ul .nav .navbar-nav .navbar-right --}}

		</div> {{-- /.containr --}}
	</div> {{-- /.navbar--}}

	<div class="container">
		@yield('content')
	</div>

	@yield('modal')

	@include('modal/login');
	@include('modal/register');

	<!-- Scripts -->
	@include('scripts')
	@yield('scripts')

</body>

</html>