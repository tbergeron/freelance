{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name') }}
		</li>
		<li>
			{{ Form::label('code', 'Code:') }}
			{{ Form::text('code') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}