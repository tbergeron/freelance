{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('user_id', 'User_id:') }}
			{{ Form::text('user_id') }}
		</li>
		<li>
			{{ Form::label('task_id', 'Task_id:') }}
			{{ Form::text('task_id') }}
		</li>
		<li>
			{{ Form::label('content', 'Content:') }}
			{{ Form::textarea('content') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}