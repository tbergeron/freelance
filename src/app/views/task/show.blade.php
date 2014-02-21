@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
    {{ $task->name }}
    <div class="pull-right">
        @include('task.partials.close_toggle_link', ['from_task' => true])
        {{ Html::linkAction('TaskController@getEdit', trans('task.edit'), ['id' => $task->id], ['class' => 'btn btn-default']) }}
    </div>
</h2>

{{ Markdown::render($task->description) }}

<hr/>

@include('comment.partials.list')

@stop