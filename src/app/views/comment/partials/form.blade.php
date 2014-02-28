@if(isset($edit))
{{ Form::model($comment, ['action' => ['CommentController@postUpdate', $comment->id]]) }}
@else
{{ Form::open(['action' => 'CommentController@postStore', 'method' => 'POST']) }}
@endif

    {{ Form::hidden('task_id', $task->id) }}
    {{ $errors->first('project_id') }}
    {{ $errors->first('user_id') }}
    
    {{ $errors->first('content') }}
    {{ Form::textarea('content', null, ['placeholder' => trans('comment.content_placeholder'), 'class' => 'form-control']) }}
    <br />
    {{ Form::submit(((isset($edit)) ? trans('comment.update') : null), ['class' => 'btn btn-primary pull-right']) }}
    
{{ Form::close() }}