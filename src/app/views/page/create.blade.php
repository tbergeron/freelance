@extends('layouts.master')

@section('title')
{{ trans('page.create') }} -
@stop

@section('content')

<h2>{{ trans('page.create') }}</h2>

{{ Form::open(['action' => 'PageController@postStore']) }}

@include('page.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
@include('partials.markdown_editor', ['id' => 'content'])
@stop