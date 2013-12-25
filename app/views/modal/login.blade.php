{{-- Login Modal --}}
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="text-center"> Welcome, Geek </h4>
					</div>

					<div class="modal-body">
						{{ Form::open(array('route' => 'login', 'action' => 'POST', 'role' => 'form')) }}
							{{ Form::token() }}

							<p> {{ Form::email('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }} </p>
							<p> {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }} </p>

							<div class="checkbox">
								<label>
									{{ Form::checkbox('rememberme', 0, 'false')}}
									Remember Me
								</label>
							</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						{{ Form::submit('Login', array('class' => 'btn btn-primary'))}}
						{{ Form::close()}}
					</div>

				</div> {{-- /.modal-content --}}
			</div> {{-- /.modal-dialog --}}
		</div>{{-- /.modal fade --}}