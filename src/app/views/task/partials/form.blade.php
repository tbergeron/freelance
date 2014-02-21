<fieldset>
    <div class="col-md-4">
        <div class="form-group @if($errors->has('project_id')) has-feedback has-error @endif">
            {{ Form::label('project_id', trans('task.project_id')) }}
            {{ $errors->first('project_id') }}
            <div class="controls">
                {{ Form::select('project_id', Project::forDropdown(), (isset($project)) ? $project->id : $project_id, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group @if($errors->has('milestone_id')) has-feedback has-error @endif">
            {{ Form::label('milestone_id', trans('task.milestone_id')) }}
            {{ $errors->first('milestone_id') }}
            <div class="controls">
                {{ Form::select('milestone_id', Milestone::forDropdown((isset($project)) ? $project->id : $project_id), (isset($milestone_id)) ? $milestone_id : null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group @if($errors->has('user_id')) has-feedback has-error @endif">
            {{ Form::label('user_id', trans('task.user_id')) }}
            {{ $errors->first('user_id') }}
            <div class="controls">
                {{ Form::select('user_id', User::forDropdown(), (isset($task)) ? $task->user_id : Auth::user()->id, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group @if($errors->has('name')) has-feedback has-error @endif">
            {{ Form::label('name', trans('task.name')) }}
            {{ $errors->first('name') }}
            <div class="controls">
                {{ Form::text('name', null, ['placeholder' => trans('task.name_placeholder'), 'class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group @if($errors->has('description')) has-feedback has-error @endif">
            {{ Form::label('description', trans('task.description')) }}
            <div class="controls">
                {{ $errors->first('description') }}
                <div id="description" class="markdown_editor form-control"></div>
                {{ Form::textarea('description', null, ['placeholder' => trans('task.description_placeholder'), 'class' => 'form-control description']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
        </div>

    </div>
</fieldset>