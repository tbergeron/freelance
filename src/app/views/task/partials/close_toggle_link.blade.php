@if($task->is_closed)
{{ Html::linkAction('TaskController@getReopen', trans('task.reopen_task'), ['id' => $task->id, 'from_task' => ((isset($from_task)) ? true : false)]) }}
@else
    {{ Html::linkAction('TaskController@getClose', trans('task.close_task'), ['id' => $task->id, 'from_task' => ((isset($from_task)) ? true : false)]) }}
@endif
