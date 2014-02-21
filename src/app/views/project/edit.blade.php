@extends('layouts.master')

@section('title')
{{ $project->name }} -
{{ trans('project.index') }}
-
@stop

@section('content')

<h2>{{ $project->name }}</h2>

{{ Form::model($project, ['action' => ['ProjectController@postUpdate', $project->id]]) }}

    @include('project.partials.form')

{{ Form::close() }}

@stop