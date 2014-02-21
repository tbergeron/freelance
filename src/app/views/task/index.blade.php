@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

<h2>{{ trans('task.heading') }}</h2>

@include('task.partials.filter_bar')

@include('task.partials.list', ['show_states' => true])

{{ $tasks->links('partials.pagination') }}

@stop