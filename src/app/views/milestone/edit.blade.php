@extends('layouts.master')

@section('title')
{{ $milestone->name }} -
{{ trans('milestone.index') }}
-
@stop

@section('content')

<h2>
    {{ Html::linkAction('ProjectController@getShow', $milestone->project->name, ['id' => $milestone->project->id]) }}
    @include('partials.heading_separator')
    {{ $milestone->name }}
</h2>

{{ Form::model($milestone, ['action' => ['MilestoneController@postUpdate', $milestone->id], 'files' => true]) }}

    @include('milestone.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
    @include('partials.markdown_editor')
@stop