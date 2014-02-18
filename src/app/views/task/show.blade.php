@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

<h2>{{ $task->name }}</h2>

@include('partials.messages')

@include('comment.partials.comments')

@stop