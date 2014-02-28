@extends('layouts.master')

@section('title')
{{ $project->name }} -
{{ trans('project.index') }}
-
@stop

@section('content')

<h2 class="section-heading">
    <div class="pull-left">
        {{ $project->name }}
    </div>
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
        <a title="{{ trans('page.create') }}" href="{{ URL::action('PageController@getCreate', ['project_id' => $project->id]) }}"
           class="btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus-sign"></i>
            {{ trans('page.page') }}
        </a>
        <a title="{{ trans('project.edit') }}" href="{{ URL::action('ProjectController@getEdit', ['project_id' => $project->id]) }}"
           class="btn btn-default btn-sm">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    </div>
    <div class="visible-xs"><br/></div>
</h2>

<br/>

@if($project->description)
<hr />
<p>
    {{ Markdown::render($project->description) }}
</p>
@endif

<hr />

<div class="columns-without-padding">
    <div class="col-lg-6">
        <h3>{{ Html::linkAction('MilestoneController@getIndex', trans('project.milestones'), ['id' => $project->id]) }}</h3>
        @include('milestone.partials.list', ['milestones' => $project->milestones])
    </div>
    <div class="col-lg-6">
        <h3>{{ Html::linkAction('PageController@getIndex', trans('project.pages'), ['id' => $project->id]) }}</h3>
        @include('page.partials.list', ['pages' => $project->pages])
    </div>
</div>

<hr />

<div class="col-lg-12 no-horizontal-padding">
    <h3>{{ Html::linkAction('TaskController@getProject', trans('app.latest_tasks'), ['id' => $project->id]) }}</h3>
    @include('task.partials.list', ['tasks' => $tasks, 'show_states' => true])
</div>

@stop