@extends('layouts.master')

@section('title')
{{ $task->name }} -
{{ trans('task.index') }}
-
@stop

@section('content')

@include('partials.project')
<h2>{{ $task->name }}</h2>

@include('partials.messages')

{{ Form::model($task, ['action' => ['TaskController@postUpdate', $task->id]]) }}

@include('task.partials.form')

{{ Form::close() }}

@stop