@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

@include('partials.project')
<h2>{{ trans('task.heading_with_name', ['name' => $project->name]) }}</h2>

<h4>{{ ($closed) ? 'Closed tasks' : 'Opened tasks' }}</h4>
<a href="?closed=1">Closed tasks</a>
-
<a href="?">Opened tasks</a>

<div>
    {{ Html::linkAction('TaskController@getCreate', trans('task.create'), ['project_id' => $project->id]) }}
</div>

<br/>

@include('partials.messages')

@include('task.partials.list')

@stop