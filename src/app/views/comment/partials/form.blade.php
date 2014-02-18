{{ Form::open(['action' => 'CommentController@postStore', 'method' => 'POST']) }}

    {{ Form::hidden('task_id', $task->id) }}
    {{ $errors->first('project_id') }}
    {{ $errors->first('user_id') }}
    
    {{ $errors->first('content') }}
    {{ Form::textarea('content') }}
    <br />
    {{ Form::submit() }}
    
{{ Form::close() }}