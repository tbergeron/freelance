@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

@include('partials.project')
<h2>{{ $task->name }}</h2>

<div>
    @include('task.partials.close_toggle_link', ['from_task' => true])
</div>

<br />

<div>
    {{ Markdown::render($task->description) }}
</div>

@include('partials.messages')

@include('comment.partials.list')

@stop