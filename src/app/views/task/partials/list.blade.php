<ul>
    @foreach ($tasks as $task)

    <li>
        {{ Html::linkAction('TaskController@getShow', $task->name, ['id' => $task->id]) }} - 
        {{ Html::linkAction('TaskController@getEdit', trans('task.edit'), ['id' => $task->id]) }}
    </li>

    @endforeach
</ul>