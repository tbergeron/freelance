@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
    @include('partials.heading_separator')
    {{ $task->name_short() }}
    <div class="pull-right">
        @include('task.partials.close_toggle_link', ['from_task' => true])
        {{ Html::linkAction('TaskController@getEdit', trans('task.edit'), ['id' => $task->id], ['class' => 'btn btn-default']) }}
    </div>
</h2>

<div class="table-responsive task-info-table">
    <table class="table">
        <tr class="warning">
            <th>Status</th>
            <td>@include('task.partials.state')</td>
            <th>Assignee</th>
            <td>{{ $task->user->full_name }}</td>
        </tr>
        <tr class="warning">
            <th>Milestone</th>
            <td>
                @if($task->milestone)
                {{ Html::linkAction('MilestoneController@getShow', $task->milestone->name, ['id' => $task->milestone->id]) }}
                @else None @endif
            </td>
            <th>Last update</th>
            <td>{{ $task->updated_at->diffForHumans() }}</td>
        </tr>
    </table>
</div>

{{ Markdown::render($task->description) }}

<hr/>

@include('comment.partials.list')

@stop