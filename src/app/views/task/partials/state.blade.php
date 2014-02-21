@if($task->is_closed)
    <span class="label label-default">{{ trans('task.closed') }}</span>
@else
    <span class="label label-success">{{ trans('task.opened') }}</span>
@endif