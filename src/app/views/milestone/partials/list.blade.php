<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>Name</th>
            <th>Due</th>
            <th>Created</th>
            @if(isset($show_actions))
            <th style="width: 11%;">{{ trans('milestone.actions') }}</th>
            @endif
        </tr>

        @foreach ($milestones as $milestone)

        <tr>
            <td>{{ Html::linkAction('MilestoneController@getShow', $milestone->name, ['id' => $milestone->id]) }}</td>
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