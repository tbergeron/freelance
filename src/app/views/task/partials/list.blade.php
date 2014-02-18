<ul>
    @foreach ($tasks as $task)

    <li>
        {{ Html::linkAction('TaskController@getEdit', $task->name, ['id' => $task->id]) }}
    </li>

    @endforeach
</ul>