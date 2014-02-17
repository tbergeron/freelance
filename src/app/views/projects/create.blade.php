@extends('layouts.master')

@section('title')
{{ trans('project.create') }} -
@stop

@section('content')

@include('partials.messages')

<h2>{{ trans('project.create') }}</h2>

{{ Form::open(['action' => 'ProjectController@postStore', 'files' => true]) }}

    @include('projects.partials.form')

{{ Form::close() }}

@stop