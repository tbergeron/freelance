<fieldset>
    <div class="col-md-8">
        <div class="form-group @if($errors->has('name')) has-feedback has-error @endif">
            {{ Form::label('name', trans('page.name')) }}
            {{ $errors->first('name') }}
            <div class="controls">
                {{ Form::text('name', null, ['placeholder' => trans('page.name_placeholder'), 'class' => 'form-control']) }}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group @if($errors->has('project_id')) has-feedback has-error @endif">
            {{ Form::label('project_id', trans('page.project_id')) }}
            {{ $errors->first('project_id') }}
            <div class="controls">
                {{ Form::select('project_id', Project::forDropdown(), (isset($project)) ? $project->id : null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group @if($errors->has('content')) has-feedback has-error @endif">
            {{ Form::label('content', trans('page.content')) }}
            <div class="controls">
                {{ $errors->first('content') }}
                <div id="content" class="markdown_editor form-control"></div>
                {{ Form::textarea('content', null, ['placeholder' => trans('page.content_placeholder'), 'class' => 'form-control content']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
        </div>

    </div>
</fieldset>