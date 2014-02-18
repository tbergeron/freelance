@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

<small>Project: {{ Html::linkAction('ProjectController@getShow', $task->project->name, ['id' => $task->project->id]) }}</small>
<h2>{{ $task->name }}</h2>

<div>
    {{ $task->description }}
</div>

@include('partials.messages')

@include('comment.partials.comments')

@stop