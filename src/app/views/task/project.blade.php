@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

<h2>{{ trans('task.heading_with_name', ['name' => $project->name]) }}</h2>

<div>
    {{ Html::linkAction('TaskController@getCreate', trans('task.create')) }}
    TODO: this link should pre-select the project
</div>

<br/>

@include('partials.messages')

@include('task.partials.list')

@stop