@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name_short(), ['id' => $project->id]) }}
    @include('partials.heading_separator')
    {{ $task->name_short() }}
    @include('task.partials.starred_task')
    <div class="pull-right">
        @include('task.partials.close_toggle_link', ['from_task' => true])
        {{ Html::linkAction('TaskController@getEdit', trans('task.edit'), ['id' => $task->id], ['class' => 'btn btn-default']) }}
    </div>
</h2>

<div class="table-responsive task-info-table">
    <table class="table">
        <tr class="warning">
            <th>{{ trans('task.status') }}</th>
            <td>@include('task.partials.state')</td>
            <th>{{ trans('task.assignee') }}</th>
            <td>{{ $task->user->full_name }}</td>
        </tr>
        <tr class="warning">
            <th>{{ trans('task.milestone') }}</th>
            <td>
                @if($task->milestone)
                {{ Html::linkAction('MilestoneController@getShow', $task->milestone->name, ['id' => $task->milestone->id]) }}
                @else {{ trans('task.none') }} @endif
            </td>
            <th>{{ trans('task.last_update') }}</th>
            <td>{{ $task->updated_at->diffForHumans() }}</td>
        </tr>
    </table>
</div>

<h4>{{ $task->name }}</h4>

{{ Markdown::render($task->description) }}

<hr/>

@include('comment.partials.list')

@stop