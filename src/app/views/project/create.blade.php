@extends('layouts.master')

@section('title')
{{ trans('project.create') }} -
@stop

@section('content')

<h2>{{ trans('project.create') }}</h2>

{{ Form::open(['action' => 'ProjectController@postStore']) }}

    @include('project.partials.form')

{{ Form::close() }}

@stop