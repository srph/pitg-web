@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-4">
			<div class="list-group">
				<a href="{{ URL::route('message.index') }}" class="list-group-item active">Messages<span class="badge">{{ Message::countUnread() }}</span></a>
				<a href="{{ URL::route('account_settings') }}" class="list-group-item" id="sidebar" role="navigation">Account Settings</strong></a>
				<a href="{{ URL::route('profile_settings') }}" class="list-group-item" id="sidebar" role="navigation">Profile Settings</a>
			</div> {{-- ./list-group --}}
		</div>{{-- ./col-md-3 --}}

		<div class="col-md-8">
			{{-- Message Bubbles? --}}
		</div>
	</div>{{-- /.row --}}
@stop

@section('scripts')
@stop