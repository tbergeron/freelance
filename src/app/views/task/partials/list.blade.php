<table>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Assignee</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>

    @foreach ($tasks as $task)

    <tr>
        <td>{{ $task->code() }}</td>
        <td>{{ Html::linkAction('TaskController@getShow', $task->name, ['id' => $task->id]) }}</td>
        <td>{{ $task->user->full_name }}</td>
        <td>{{ $task->created_at->diffForHumans() }}</td>
        <td>
            @include('task.partials.close_toggle_link')
            -
            {{ Html::linkAction('TaskController@getEdit', trans('task.edit'), ['id' => $task->id]) }}
            -
            <a href="{{ URL::action('TaskController@getDestroy', $task->id) }}" onclick="return confirm('{{ trans('task.destroy_question', ['name' => $task->name]) }}')">
                {{ trans('task.destroy') }}
            </a>
        </td>
    </tr>

    @endforeach
</table>