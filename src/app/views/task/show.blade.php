@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

@include('partials.project')
<h2>{{ $task->name }}</h2>

<div>
    {{ $task->description }}
</div>

@include('partials.messages')

@include('comment.partials.comments')

@stop