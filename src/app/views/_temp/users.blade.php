{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email') }}
		</li>
		<li>
			{{ Form::label('password', 'Password:') }}
			{{ Form::text('password') }}
		</li>
		<li>
			{{ Form::label('full_name', 'Full_name:') }}
			{{ Form::text('full_name') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}