TODO: Add details to this list
<ul>
    @foreach ($tasks as $task)

    <li>
        {{ Html::linkAction('TaskController@getShow', $task->name, ['id' => $task->id]) }}
        - 
        {{ Html::linkAction('TaskController@getEdit', trans('task.edit'), ['id' => $task->id]) }}
        -
        <a href="{{ URL::action('TaskController@getDestroy', $task->id) }}" onclick="return confirm('{{ trans('task.destroy_question', ['name' => $task->name]) }}')">
            {{ trans('task.destroy') }}
        </a>

    </li>

    @endforeach
</ul>