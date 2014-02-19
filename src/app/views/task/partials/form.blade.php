TODO: Use dropdowns for foreign keys
<ul>
    <li>
        {{ Form::label('project_id', 'Project_id:') }}
        {{ $errors->first('project_id') }}
        {{ Form::text('project_id', (isset($project_id)) ? $project_id : null) }}
    </li>
    <li>
        {{ Form::label('milestone_id', 'Milestone_id:') }}
        {{ $errors->first('milestone_id') }}
        {{ Form::text('milestone_id') }}
    </li>
    <li>
        {{ Form::label('user_id', 'User_id:') }}
        {{ $errors->first('user_id') }}
        {{ Form::text('user_id') }}
    </li>
    <li>
        {{ Form::label('name', 'Name:') }}
        {{ $errors->first('name') }}
        {{ Form::text('name') }}
    </li>
    <li>
        {{ Form::label('is_closed', 'Is_closed:') }}
        {{ $errors->first('is_closed') }}
        {{ Form::checkbox('is_closed') }}
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