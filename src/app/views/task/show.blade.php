@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

@include('partials.project')
<h2>{{ $task->name }}</h2>

<div>
    {{ Html::linkAction('TaskController@getEdit', trans('task.edit'), ['id' => $task->id]) }}
    -
    @include('task.partials.close_toggle_link', ['from_task' => true])
</div>

<br />

<div>
    {{ Markdown::render($task->description) }}
</div>

@include('partials.messages')

<hr/>

@include('comment.partials.list')

@stop