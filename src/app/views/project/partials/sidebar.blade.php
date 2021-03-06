<ul class="nav nav-pills nav-stacked project-sidebar">
    <li class="@if(strpos(Route::currentRouteAction(), 'ProjectController') !== false)active@endif">
        <a href="{{ URL::action('ProjectController@getShow', ['id' => $project->id]) }}">
            {{ $project->name_short() }}
        </a>
    </li>
    <li class="@if((strpos(Route::currentRouteAction(), 'TaskController') !== false) || (strpos(Route::currentRouteName(), 'task_code') !== false))active@endif">
        <a href="{{ URL::action('TaskController@getIndex', ['project_id' => $project->id]) }}">
            <span class="badge pull-right hidden-sm">{{ count($project->tasks) }}</span>
            Tasks
        </a>
    </li>
    <li class="@if(strpos(Route::currentRouteAction(), 'MilestoneController') !== false)active@endif">
        <a href="{{ URL::action('MilestoneController@getIndex', ['id' => $project->id]) }}">
            <span class="badge pull-right hidden-sm">{{ count($project->milestones) }}</span>
            Milestones
        </a>
    </li>
    <li class="@if(strpos(Route::currentRouteAction(), 'PageController') !== false)active@endif">
        <a href="{{ URL::action('PageController@getIndex', ['id' => $project->id]) }}">
            <span class="badge pull-right hidden-sm">{{ count($project->pages) }}</span>
            Pages
        </a>
    </li>
</ul>