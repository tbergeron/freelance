<fieldset>
    <div class="col-md-2">
        <div class="form-group @if($errors->has('code')) has-feedback has-error @endif">
            {{ Form::label('code', trans('project.code')) }}
            {{ $errors->first('code') }}
            <div class="controls">
                {{ Form::text('code', null, ['placeholder' => trans('project.code_placeholder'), 'class' => 'form-control']) }}
            </div>
        </div>
    </div>

    <div class="col-md-10">
        <div class="form-group @if($errors->has('name')) has-feedback has-error @endif">
            {{ Form::label('name', trans('project.name')) }}
            {{ $errors->first('name') }}
            <div class="controls">
                {{ Form::text('name', null, ['placeholder' => trans('project.name_placeholder'), 'class' => 'form-control']) }}
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group @if($errors->has('description')) has-feedback has-error @endif">
            {{ Form::label('description', trans('project.description')) }}
            <div class="controls">
                {{ $errors->first('description') }}
                {{ Form::textarea('description', null, ['placeholder' => trans('project.description_placeholder'), 'class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
        </div>
    </div>

</fieldset>