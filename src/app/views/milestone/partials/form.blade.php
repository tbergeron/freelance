<fieldset>
    <div class="col-md-12">
        <div class="form-group @if($errors->has('project_id')) has-feedback has-error @endif">
            {{ Form::label('project_id', trans('milestone.project_id')) }}
            {{ $errors->first('project_id') }}
            <div class="controls">
                {{ Form::select('project_id', Project::forDropdown(), (isset($project)) ? $project->id : null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group @if($errors->has('name')) has-feedback has-error @endif">
            {{ Form::label('name', trans('milestone.name')) }}
            {{ $errors->first('name') }}
            <div class="controls">
                {{ Form::text('name', null, ['placeholder' => trans('milestone.name_placeholder'), 'class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group @if($errors->has('due_date')) has-feedback has-error @endif">
            {{ Form::label('due_date', trans('milestone.due_date')) }}
            <div class="controls">
                {{ $errors->first('due_date') }}
                <div class="input-group calendar_bugfix">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    {{ Form::text('due_date', null, ['placeholder' => trans('milestone.due_date_placeholder'), 'class' => 'form-control datepicker']) }}
                </div>
            </div>
        </div>

        <div class="form-group @if($errors->has('description')) has-feedback has-error @endif">
            {{ Form::label('description', trans('milestone.description')) }}
            <div class="controls">
                {{ $errors->first('description') }}
                {{ Form::textarea('description', null, ['placeholder' => trans('milestone.description_placeholder'), 'class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
        </div>
    </div>
</fieldset>