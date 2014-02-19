@extends('layouts.master')

@section('title')
{{ trans('task.create') }} -
@stop

@section('content')

@include('partials.messages')

<h2>{{ trans('task.create') }}</h2>

{{ Form::open(['action' => 'TaskController@postStore']) }}

@include('task.partials.form')

{{ Form::close() }}

@stop