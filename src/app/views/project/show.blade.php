@extends('layouts.master')

@section('title')
{{ $project->name }} -
{{ trans('project.index') }}
-
@stop

@section('content')

<h2 class="section-heading">
    {{ $project->name }}
    <div class="pull-right">
        {{ Html::linkAction('TaskController@getProject', trans('project.tasks'), ['id' => $project->id], ['class' => 'btn btn-success btn-sm']) }}
        {{ Html::linkAction('MilestoneController@getIndex', trans('project.milestones'), ['id' => $project->id], ['class' => 'btn btn-success btn-sm']) }}
        {{ Html::linkAction('ProjectController@getEdit', trans('project.edit'), ['id' => $project->id], ['class' => 'btn btn-default btn-sm']) }}
    </div>
</h2>

{{ Markdown::render($project->description) }}

<hr />

<h3>{{ Html::linkAction('MilestoneController@getIndex', trans('project.milestones'), ['id' => $project->id]) }}</h3>
@include('milestone.partials.list', ['milestones' => $project->milestones])

<hr />

<h3>{{ Html::linkAction('TaskController@getProject', trans('app.latest_tasks'), ['id' => $project->id]) }}</h3>
@include('task.partials.list', ['tasks' => $tasks, 'show_states' => true])

@stop