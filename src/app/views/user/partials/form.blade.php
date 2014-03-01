<fieldset class="user-form">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group @if($errors->has('full_name')) has-feedback has-error @endif">
                {{ Form::label('name', trans('user.full_name')) }}
                {{ $errors->first('full_name') }}
                <div class="controls">
                    {{ Form::text('full_name', null, ['placeholder' => trans('user.full_name_placeholder'), 'class' => 'form-control']) }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group checkbox @if($errors->has('is_admin')) has-feedback has-error @endif">
                <label>
                    {{ Form::checkbox('is_admin', null, ['class' => 'form-control']) }}
                    {{ trans('user.is_admin') }}
                </label>
                <p class="help-block">
                    @if($errors->has('is_admin'))
                    {{ $errors->first('is_admin') }}
                    @else
                    {{ trans('user.is_admin_warning') }}
                    @endif
                </p>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group @if($errors->has('email')) has-feedback has-error @endif">
                {{ Form::label('email', trans('user.email')) }}
                <div class="controls">
                    {{ $errors->first('email') }}
                    {{ Form::text('email', null, ['placeholder' => trans('user.email_placeholder'), 'class' => 'form-control']) }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group @if($errors->has('password')) has-feedback has-error @endif">
                {{ Form::label('password', trans('user.password')) }}
                <div class="controls">
                    {{ $errors->first('password') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                    @if(isset($edit))
                    <p class="help-block">
                        {{ trans('user.fill_only_to_replace') }}
                    </p>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <hr/>

    <h3>{{ trans('user.permissions') }}</h3>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>{{ trans('user.project') }}</th>
                <th style="width: 25%">{{ trans('user.read') }}</th>
                <th style="width: 25%">{{ trans('user.write') }}</th>
            </tr>
            @foreach($projects as $project)
            <tr>
                <td>{{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}</td>
                <td>
                    <input name="permissions[{{ $project->id }}][read]" type="checkbox"
                        @if(isset($edit))
                            @if(Permission::isChecked($permissions, $project, 'read'))checked="checked"@endif
                        @endif
                    >
                </td>
                <td>
                    <input name="permissions[{{ $project->id }}][write]" type="checkbox"
                        @if(isset($edit))
                            @if(Permission::isChecked($permissions, $project, 'write'))checked="checked"@endif
                        @endif
                    >
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <br/>
    <small>{{ trans('user.read_notice') }}</small>

</fieldset>