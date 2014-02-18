@extends('layouts.master')

@section('title')
{{ $project->name }} -
{{ trans('project.index') }}
-
@stop

@section('content')

<h2>{{ $project->name }}</h2>

@include('partials.messages')

{{ Form::model($project, ['action' => ['ProjectController@postUpdate', $project->id], 'files' => true]) }}

    @include('project.partials.form')

{{ Form::close() }}

@stop