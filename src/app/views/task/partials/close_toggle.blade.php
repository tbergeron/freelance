<h3>{{ (isset($closed)) ? trans('task.closed_tasks') : trans('task.opened_tasks') }}</h3>
<a href="?closed=1">{{ trans('task.closed_tasks') }}</a> - <a href="?">{{ trans('task.opened_tasks') }}</a>