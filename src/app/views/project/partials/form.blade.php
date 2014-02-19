<ul>
    <li>
        {{ Form::label('name', trans('project.name')) }}
        {{ $errors->first('name') }}
        {{ Form::text('name') }}
    </li>
    <li>
        {{ Form::label('code', trans('project.code')) }}
        {{ $errors->first('code') }}
        {{ Form::text('code') }}
    </li>
    <li>
        {{ Form::label('description', trans('project.description')) }}
        {{ $errors->first('description') }}
        {{ Form::textarea('description') }}
    </li>
    <li>
        {{ Form::submit() }}
    </li>
</ul>