<table>
    <tr>
        <th>{{ trans('task.code') }}</th>
        <th>{{ trans('task.name') }}</th>
        <th>{{ trans('task.assignee') }}</th>
        @if(isset($show_states))
        <th>State</th>
        @endif
        <th>{{ trans('task.last_update') }}</th>
        @if(isset($show_actions))
        <th>{{ trans('task.actions') }}</th>
        @endif
    </tr>

    @foreach ($tasks as $task)

    <tr>
        <td>{{ $task->code() }}</td>
        <td>{{ Html::linkAction('TaskController@getShow', $task->name, ['id' => $task->id]) }}</td>
        <td>@if($task->user) {{ $task->user->full_name }} @endif</td>
        @if(isset($show_states))
        <td>{{ ($task->is_closed) ? trans('task.closed') : trans('task.opened') }}</td>
        @endif
        <td>{{ $task->updated_at->diffForHumans() }}</td>
        @if(isset($show_actions))
        <td>
            @include('task.partials.close_toggle_link')
            -
            {{ Html::linkAction('TaskController@getEdit', trans('task.edit'), ['id' => $task->id]) }}
            -
            <a href="{{ URL::action('TaskController@getDestroy', $task->id) }}" onclick="return confirm('{{ trans('task.destroy_question', ['name' => $task->name]) }}')">
                {{ trans('task.destroy') }}
            </a>
        </td>
        @endif
    </tr>

    @endforeach
</table>