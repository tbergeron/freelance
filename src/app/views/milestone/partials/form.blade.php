<ul>
    <li>
        {{ Form::label('project_id', trans('milestone.project_id')) }}
        {{ $errors->first('project_id') }}
        {{ Form::select('project_id', Project::toDropdown(), $project->id) }}
    </li>
    <li>
        {{ Form::label('name', trans('milestone.name')) }}
        {{ $errors->first('name') }}
        {{ Form::text('name') }}
    </li>
    <li>
        {{ Form::label('due_date', trans('milestone.due_date')) }}
        {{ $errors->first('due_date') }}
        {{ Form::text('due_date') }}
    </li>
    <li>
        {{ Form::label('description', trans('milestone.description')) }}
        {{ $errors->first('description') }}
        {{ Form::textarea('description') }}
    </li>
    <li>
        {{ Form::submit() }}
    </li>
</ul>