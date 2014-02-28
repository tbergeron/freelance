@extends('layouts.master')

@section('title')
{{ $milestone->name }} -
{{ trans('milestone.index') }}
-
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
    @include('partials.heading_separator')
    {{ $milestone->name }}
    <div class="pull-right">
        <a title="{{ trans('milestone.edit_milestone') }}" href="{{ URL::action('MilestoneController@getEdit', ['id' => $milestone->id]) }}"
           class="btn btn-default">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    </div>
</h2>

@if($milestone->due_date)
    {{ trans('milestone.due_in') }} <strong>{{ $milestone->due_date->diffForHumans() }}</strong>.
@endif

<div class="markdown_content">
    {{ Markdown::render($milestone->description) }}
</div>

<hr/>

<h3>{{ trans('milestone.tasks') }}</h3>
@include('task.partials.list')

@stop