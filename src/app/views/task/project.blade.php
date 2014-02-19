@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

@include('partials.project')
<h2>{{ trans('task.heading_with_name', ['name' => $project->name]) }}</h2>

<h4>{{ ($closed) ? trans('task.closed_tasks') : trans('task.opened_tasks') }}</h4>
<a href="?closed=1">{{ trans('task.closed_tasks') }}</a> - <a href="?">{{ trans('task.opened_tasks') }}</a>

<br />
<br />

<div>
    {{ Html::linkAction('TaskController@getCreate', trans('task.create'), ['project_id' => $project->id]) }}
</div>

<br/>

@include('partials.messages')

@include('task.partials.list', ['show_actions' => true])

@stop