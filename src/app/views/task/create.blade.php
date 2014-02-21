@extends('layouts.master')

@section('title')
{{ trans('task.create') }} -
@stop

@section('content')

<h2>{{ trans('task.create') }}</h2>

{{ Form::open(['action' => 'TaskController@postStore']) }}

@include('task.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
    @include('partials.markdown_editor', ['id' => 'description'])
@stop