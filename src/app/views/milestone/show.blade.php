@extends('layouts.master')

@section('title')
{{ $milestone->name }} -
{{ trans('milestone.index') }}
-
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
    {{ $milestone->name }}
    <div class="pull-right">
        {{ Html::linkAction('MilestoneController@getEdit', trans('milestone.edit_milestone'), ['id' => $milestone->id], ['class' => 'btn btn-default']) }}
    </div>
</h2>

{{ trans('milestone.due_in') }} <strong>{{ $milestone->due_date->diffForHumans() }}</strong>.

<hr/>

<h3>{{ trans('milestone.tasks') }}</h3>
@include('task.partials.list')

@stop