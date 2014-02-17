<ul>
    <li>
        {{ Form::label('name', 'Name:') }}
        {{ $errors->first('name') }}
        {{ Form::text('name') }}
    </li>
    <li>
        {{ Form::label('code', 'Code:') }}
        {{ $errors->first('code') }}
        {{ Form::text('code') }}
    </li>
    <li>
        {{ Form::submit() }}
    </li>
</ul>