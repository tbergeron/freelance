{{ Form::open(['action' => 'CommentController@postStore', 'method' => 'POST']) }}
    {{ Form::hidden('task_id', $task->id) }}
        {{ $errors->first('project_id') }}
        {{ $errors->first('user_id') }}
	<ul>
		<li>
			{{ Form::label('content', 'Content:') }}
            {{ $errors->first('content') }}
            {{ Form::textarea('content') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}