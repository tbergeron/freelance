@extends('layouts.master')

@section('title')
{{ $milestone->name }} -
{{ trans('milestone.index') }}
-
@stop

@section('content')

@include('partials.project')
<h2>{{ $milestone->name }}</h2>
Due {{ $milestone->due_date->diffForHumans() }}

@include('partials.messages')

<h3>{{ trans('milestone.tasks') }}</h3>
@include('task.partials.list')

@stop