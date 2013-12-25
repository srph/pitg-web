@if(Session::has('success'))
	<div class="alert alert-success alert-dismissable">
	 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p>{{ Session::get('success') }}</p>
	</div>
@endif

@if(Session::has('warning'))
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p>{{ Session::get('warning') }}</p>
	</div>
@endif

@if(Session::has('error'))
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p>{{ Session::get('error') }}</p>
	</div>
@endif