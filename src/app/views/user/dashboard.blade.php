@extends('layouts.master')

@section('title')
{{ trans('app.dashboard') }} -
@stop

@section('content')

<h2>{{ trans('app.dashboard') }}</h2>

<div>
    {{ trans('app.welcome') }}
</div>

<h3>{{ trans('app.starred_tasks') }}</h3>
@include('task.partials.list', ['tasks' => $starred_tasks, 'show_states' => true, 'show_project_names' => true])

<hr/>

<h3>{{ trans('app.latest_tasks') }}</h3>
@include('task.partials.list', ['tasks' => $tasks, 'show_states' => true, 'show_project_names' => true])

@stop