@if($task->is_closed)
<a title="{{ trans('task.reopen_task') }}" href="{{ URL::action('TaskController@getReopen', ['id' => $task->id, 'from_task' => ((isset($from_task)) ? true : false)]) }}" class="btn btn-danger {{ ((isset($small_buttons)) ? 'btn-sm' : null) }}">
    <i class="glyphicon glyphicon-refresh"></i>
</a>
@else
<a title="{{ trans('task.close_task') }}" href="{{ URL::action('TaskController@getClose', ['id' => $task->id, 'from_task' => ((isset($from_task)) ? true : false)]) }}" class="btn btn-success {{ ((isset($small_buttons)) ? 'btn-sm' : null) }}">
    <i class="glyphicon glyphicon-ok-circle"></i>
</a>
@endif



