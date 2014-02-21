@if($task->is_closed)
{{ Html::linkAction('TaskController@getReopen', trans('task.reopen_task'), ['id' => $task->id, 'from_task' => ((isset($from_task)) ? true : false)], ['class' => 'btn btn-primary ' . ((isset($small_buttons)) ? 'btn-sm' : null)]) }}
@else
    {{ Html::linkAction('TaskController@getClose', trans('task.close_task'), ['id' => $task->id, 'from_task' => ((isset($from_task)) ? true : false)], ['class' => 'btn btn-success ' . ((isset($small_buttons)) ? 'btn-sm' : null)]) }}
@endif