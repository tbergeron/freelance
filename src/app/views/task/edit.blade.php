@extends('layouts.master')

@section('title')
{{ $task->name }} -
{{ trans('task.index') }}
-
@stop

@section('content')

<div class="row">
    <div class="col-lg-10">
        {{ Form::model($task, ['action' => ['TaskController@postUpdate', $task->id]]) }}

        <h2 class="section-heading">
            {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
            @include('partials.heading_separator')
            {{ $task->name_short() }}
            <div class="pull-right">
                {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
                <a href="{{ URL::action('TaskController@getDestroy', $task->id) }}" class="btn btn-danger" onclick="return confirm('{{ trans('task.destroy_question', ['name' => $task->name]) }}')">
                    {{ trans('task.destroy') }}
                </a>
            </div>
        </h2>

        @include('task.partials.form')

        {{ Form::close() }}
    </div> <!-- /col-lg-10 -->
    <div class="col-lg-2">
        @include('project.partials.sidebar')
    </div>
</div>

@stop

@section('scripts')
    @include('partials.markdown_editor', ['taller' => true])
@stop