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

<ul>
    <li>{{ Html::linkAction('TaskController@getProject', trans('task.index'), ['id' => $project->id]) }}</li>
    <li>{{ Html::linkAction('MilestoneController@getIndex', trans('milestone.index'), ['id' => $project->id]) }}</li>
</ul>

@stop