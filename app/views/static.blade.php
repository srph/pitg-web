 <!DOCTYPE html>
<html lang="en">
<head>
	<title> Pinoy I.T. Geeks - {{ $title }} </title>
	<link rel="stylesheet" media="screen" href="{{ URL::asset('css/bootstrap.min.css') }}" />
	<style>

		body {
			background-color: #eee;
		}
		.container {
			width: 25%;
			margin-top: 10em;
		}

		h1, h2, h3, h4, h5 {
			margin: 0;
			text-shadow: 1px 1px 0 white;
		}

		.form-control {
			margin-bottom: 0.75em;
		}

	</style>
</head>


<body>

	<div class="container">		
		@yield('content')
	</div>
	<!-- Scripts -->
	@include('scripts')
	@yield('scripts')

</body>

</html>