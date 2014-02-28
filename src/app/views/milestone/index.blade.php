@extends('layouts.master')

@section('title')
    {{ trans('milestone.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
    @include('partials.heading_separator')
    {{ trans('milestone.milestones') }}
    <div class="pull-right">
        {{ Html::linkAction('MilestoneController@getCreate', trans('milestone.create'), ['project_id' => $project->id], ['class' => 'btn btn-default']) }}
    </div>
</h2>

@include('milestone.partials.list', ['show_actions' => true])

@stop