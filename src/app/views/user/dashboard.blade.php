@extends('layouts.master')

@section('title')
{{ trans('app.dashboard') }} -
@stop

@section('content')

@if(count($starred_tasks) > 0)
<div class="row">
    <div class="col-lg-12">
        <h3 class="heading">{{ trans('app.starred_tasks') }}</h3>
        @include('task.partials.list', ['tasks' => $starred_tasks, 'show_states' => true, 'show_project_names' => true])
        <hr/>
    </div>
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <h3 @if(count($starred_tasks) == 0)class="heading"@endif>Projects</h3>
        @include('project.partials.grid', ['projects' => $projects])
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-lg-12">
        <h3>{{ trans('app.latest_tasks') }}</h3>
        @include('task.partials.list', ['tasks' => $tasks, 'show_states' => true, 'show_project_names' => true])
    </div>
</div>

@stop