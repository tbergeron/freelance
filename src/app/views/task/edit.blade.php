@extends('layouts.master')

@section('title')
{{ $task->name }} -
{{ trans('task.index') }}
-
@stop

@section('content')

<small>Project: {{ Html::linkAction('ProjectController@getShow', $task->project->name, ['id' => $task->project->id]) }}</small>
<h2>{{ $task->name }}</h2>

@include('partials.messages')

{{ Form::model($task, ['action' => ['TaskController@postUpdate', $task->id], 'files' => true]) }}

@include('task.partials.form')

{{ Form::close() }}

@stop