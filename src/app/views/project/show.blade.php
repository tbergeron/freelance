@extends('layouts.master')

@section('title')
{{ $project->name }} -
{{ trans('project.index') }}
-
@stop

@section('content')

<h2>{{ $project->name }}</h2>

TODO: Project details here

@include('partials.messages')

<div>
    {{ Html::linkAction('TaskController@getProject', 'Tasks', ['id' => $project->id]) }}
</div>

@stop