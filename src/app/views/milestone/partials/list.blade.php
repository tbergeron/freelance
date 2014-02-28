<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>{{ trans('milestone.name') }}</th>
            <th>{{ trans('milestone.number_of_tasks') }}</th>
            <th>{{ trans('milestone.due') }}</th>
            <th>{{ trans('milestone.created_at') }}</th>
            @if(isset($show_actions))
            <th style="width: 15%;">{{ trans('milestone.actions') }}</th>
            @endif
        </tr>

        @foreach ($milestones as $milestone)

        <tr>
            <td>{{ Html::linkAction('MilestoneController@getShow', $milestone->name, ['id' => $milestone->id]) }}</td>
            <td>{{ count($milestone->tasks) }}</td>
            <td>
                @if($milestone->due_date)
                    {{ $milestone->due_date->diffForHumans() }}
                @else
                    {{ trans('milestone.no_due_date') }}
                @endif
            </td>
            <td>{{ $milestone->created_at->diffForHumans() }}</td>
            @if(isset($show_actions))
            <td>
                <a title="{{ trans('project.tasks') }}" href="{{ URL::action('MilestoneController@getShow', ['id' => $milestone->id]) }}" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-tasks"></i>
                </a>

                <a href="{{ URL::action('MilestoneController@getEdit', ['id' => $milestone->id]) }}" title="{{ trans('milestone.edit') }}" class="btn btn-default btn-sm">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>

                <a href="{{ URL::action('MilestoneController@getDestroy', $milestone->id) }}" title="{{ trans('milestone.destroy') }}" class="btn btn-default btn-sm" onclick="return confirm('{{ trans('milestone.destroy_question', ['name' => $milestone->name]) }}')">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            </td>
            @endif
        </tr>

        @endforeach

        @unless(count($milestones))
        <tr>
            <td colspan="4">{{ trans('milestone.no_records') }}</td>
        </tr>
        @endunless
    </table>
</div>