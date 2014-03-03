<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th style="width: 25px;">{{ trans('project.code') }}</th>
            <th style="width: 20px;">{{ trans('project.starred') }}</th>
            <th>{{ trans('project.name') }}</th>
            <th style="width: 12%;">{{ trans('project.last_update') }}</th>
            @if(isset($show_actions))
            <th style="width: 20%;">{{ trans('project.actions') }}</th>
            @endif
        </tr>

        @foreach ($projects as $project)

        <tr>
            <td>{{ $project->code }}</td>
            <td style="text-align: center;">
                @include('project.partials.starred_project')
            </td>
            <td>{{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}</td>
            <td>{{ $project->updated_at->diffForHumans() }}</td>
            @if(isset($show_actions))
            <td style="text-align: center">
                <a title="{{ trans('project.tasks') }}" href="{{ URL::action('TaskController@getIndex', ['id' => $project->id]) }}" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-tasks"></i>
                </a>

                <a title="{{ trans('project.milestones') }}" href="{{ URL::action('MilestoneController@getIndex', ['id' => $project->id]) }}" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-calendar"></i>
                </a>

                <a title="{{ trans('project.pages') }}" href="{{ URL::action('PageController@getIndex', ['id' => $project->id]) }}" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-file"></i>
                </a>

                <a href="{{ URL::action('ProjectController@getEdit', ['id' => $project->id]) }}" title="{{ trans('project.edit') }}" class="btn btn-default btn-sm">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>

                <a href="{{ URL::action('ProjectController@getDestroy', $project->id) }}" title="{{ trans('project.edit') }}" class="btn btn-default btn-sm" onclick="return confirm('{{ trans('project.destroy_question', ['name' => $project->name]) }}')">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            </td>
            @endif
        </tr>

        @endforeach
    </table>
</div>