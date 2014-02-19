@extends('layouts.master')

@section('title')
{{ $project->name }} -
{{ trans('project.index') }}
-
@stop

@section('content')

<h2>{{ $project->name }}</h2>

{{ Markdown::render($project->description) }}

@include('partials.messages')

<hr />


<h3>{{ Html::linkAction('MilestoneController@getIndex', trans('project.milestones'), ['id' => $project->id]) }}</h3>
@include('milestone.partials.list', ['milestones' => $project->milestones])

<hr />

<h3>{{ Html::linkAction('TaskController@getProject', trans('project.tasks'), ['id' => $project->id]) }}</h3>
@include('task.partials.list', ['tasks' => $project->tasks])

@stop