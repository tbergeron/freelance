@extends('layouts.master')

@section('title')
{{ $task->name }} -
{{ trans('task.index') }}
-
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
    {{ $task->name }}
    <div class="pull-right">
        <a href="{{ URL::action('TaskController@getDestroy', $task->id) }}" class="btn btn-danger" onclick="return confirm('{{ trans('task.destroy_question', ['name' => $task->name]) }}')">
            {{ trans('task.destroy') }}
        </a>
    </div>
</h2>

{{ Form::model($task, ['action' => ['TaskController@postUpdate', $task->id]]) }}

@include('task.partials.form')

{{ Form::close() }}

@stop