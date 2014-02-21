{{ Form::open(['action' => 'CommentController@postStore', 'method' => 'POST']) }}

    {{ Form::hidden('task_id', $task->id) }}
    {{ $errors->first('project_id') }}
    {{ $errors->first('user_id') }}
    
    {{ $errors->first('content') }}
    <div id="content" class="markdown_editor form-control" style="height:80px"></div>
    {{ Form::textarea('content', null, ['placeholder' => trans('comment.content_placeholder'), 'class' => 'form-control']) }}
    <br />
    {{ Form::submit(null, ['class' => 'btn btn-primary pull-right']) }}
    
{{ Form::close() }}