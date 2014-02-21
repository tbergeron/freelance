<div class="filter_bar well well-sm">
    <div class="btn-group">
        <a href="?all=1" class="btn btn-default @if($all)active@endif">{{ trans('task.all') }}</a>
        <a href="?closed=1" class="btn btn-default @if($closed)active@endif">{{ trans('task.closed_tasks') }}</a>
        <a href="?" class="btn btn-default @if(!$all && !$closed)active@endif">{{ trans('task.opened_tasks') }}</a>
    </div>

    <div class="pull-right">
        <a href="{{ URL::action('TaskController@getCreate', ((isset($project)) ? ['project_id' => $project->id] : null)) }}"
           class="btn btn-default">
            {{ trans('task.create') }}
        </a>
    </div>
    <div class="clear"></div>
</div>