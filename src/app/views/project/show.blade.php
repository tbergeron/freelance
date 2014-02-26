@extends('layouts.master')

@section('title')
{{ $project->name }} -
{{ trans('project.index') }}
-
@stop

@section('content')

<h2 class="section-heading">
    {{ $project->name }}
    <div class="visible-phone"><hr /></div>
    <div class="pull-right">
        <a title="{{ trans('task.create') }}" href="{{ URL::action('TaskController@getCreate', ['project_id' => $project->id]) }}"
           class="btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus-sign"></i>
            {{ trans('task.task') }}
        </a>
        <a title="{{ trans('milestone.create') }}" href="{{ URL::action('MilestoneController@getCreate', ['project_id' => $project->id]) }}"
           class="btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus-sign"></i>
            {{ trans('milestone.milestone') }}
        </a>
        <a title="{{ trans('project.edit') }}" href="{{ URL::action('ProjectController@getEdit', ['project_id' => $project->id]) }}"
           class="btn btn-default btn-sm">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
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