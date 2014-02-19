<ul>
    <li>
        {{ Form::label('project_id', trans('task.project_id')) }}
        {{ $errors->first('project_id') }}
        {{ Form::select('project_id', Project::forDropdown(), $project->id) }}
    </li>
    <li>
        {{ Form::label('milestone_id', trans('task.milestone_id')) }}
        {{ $errors->first('milestone_id') }}
        {{ Form::select('milestone_id', Milestone::forDropdown($project->id), $milestone_id) }}
    </li>
    <li>
        {{ Form::label('user_id', trans('task.user_id')) }}
        {{ $errors->first('user_id') }}
        {{ Form::select('user_id', User::forDropdown(), $task->user_id) }}
    </li>
    <li>
        {{ Form::label('name', trans('task.name')) }}
        {{ $errors->first('name') }}
        {{ Form::text('name') }}
    </li>
    <li>
        {{ Form::label('is_closed', trans('task.is_closed')) }}
        {{ $errors->first('is_closed') }}
        {{ Form::checkbox('is_closed') }}
    </li>
    <li>
        {{ Form::label('description', trans('task.description')) }}
        {{ $errors->first('description') }}
        {{ Form::textarea('description') }}
    </li>
    <li>
        {{ Form::submit() }}
    </li>
</ul>