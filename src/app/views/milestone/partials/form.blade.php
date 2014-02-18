<ul>
    <li>
        {{ Form::label('project_id', 'Project_id:') }}
        {{ $errors->first('project_id') }}
        {{ Form::text('project_id') }}
    </li>
    <li>
        {{ Form::label('name', 'Name:') }}
        {{ $errors->first('name') }}
        {{ Form::text('name') }}
    </li>
    <li>
        {{ Form::label('due_date', 'Name:') }}
        {{ $errors->first('due_date') }}
        {{ Form::text('due_date') }}
    </li>
    <li>
        {{ Form::submit() }}
    </li>
</ul>