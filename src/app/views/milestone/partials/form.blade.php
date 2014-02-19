<ul>
    <li>
        {{ Form::label('project_id', 'Project_id:') }}
        {{ $errors->first('project_id') }}
        {{ Form::text('project_id', (isset($project_id)) ? $project_id : null) }}
    </li>
    <li>
        {{ Form::label('name', 'Name:') }}
        {{ $errors->first('name') }}
        {{ Form::text('name') }}
    </li>
    <li>
        {{ Form::label('due_date', 'Due_date:') }}
        {{ $errors->first('due_date') }}
        {{ Form::text('due_date') }}
    </li>
    <li>
        {{ Form::label('description', 'Description:') }}
        {{ $errors->first('description') }}
        {{ Form::textarea('description') }}
    </li>
    <li>
        {{ Form::submit() }}
    </li>
</ul>