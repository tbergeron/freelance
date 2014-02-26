<div class="filter_bar well well-sm">
    <div class="btn-group">
        <a href="?all=1" class="btn btn-default btn-sm @if($all)active@endif">
            <div class="hidden-xs">{{ trans('task.all') }}</div>
            <div class="visible-xs"><i class="glyphicon glyphicon-asterisk"></i></div>
        </a>
        <a href="?closed=1" class="btn btn-default btn-sm @if($closed)active@endif">
            <div class="hidden-xs">{{ trans('task.closed_tasks') }}</div>
            <div class="visible-xs"><i class="glyphicon glyphicon-ban-circle"></i></div>
        </a>
        <a href="?" class="btn btn-default btn-sm @if(!$all && !$closed)active@endif">
            <div class="hidden-xs">{{ trans('task.opened_tasks') }}</div>
            <div class="visible-xs"><i class="glyphicon glyphicon-ok-circle"></i></div>
        </a>
    </div>

    <div class="pull-right">
        <a href="{{ URL::action('TaskController@getCreate', ((isset($project)) ? ['project_id' => $project->id] : null)) }}"
           class="btn btn-sm btn-success">
            <i class="glyphicon glyphicon-plus-sign"></i>
            {{ trans('task.task') }}
        </a>
    </div>
    <div class="clear"></div>
</div>