{{-- Register Modal --}}
		<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="text-center"> Create an account </h4>
					</div>

					<div class="modal-body">
						<h3 class="text-center"> Account Credentials </h3> <br />
						{{ Form::open(array('route' => 'register', 'action' => 'POST', 'role' => 'form')) }}
							{{ Form::token() }}

							<p> {{ Form::email('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }} </p>

							<p> {{ Form::text('username', Input::old('username'), array('placeholder' => 'Username', 'class' => 'form-control')) }} </p>
				
							<p> {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }} </p>

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
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						{{ Form::submit('Create account!', array('class' => 'btn btn-primary'))}}
						{{ Form::close()}}
					</div>

				</div> {{-- /.modal-content --}}
			</div> {{-- /.modal-dialog --}}
		</div>{{-- /.modal fade --}}