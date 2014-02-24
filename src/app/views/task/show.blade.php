@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    <div class="pull-right">
        @include('task.partials.close_toggle_link', ['from_task' => true])
        <a title="{{ trans('task.edit') }}" href="{{ URL::action('TaskController@getEdit', ['id' => $task->id]) }}" class="btn btn-default">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    </div>
    {{ Html::linkAction('ProjectController@getShow', $project->name_short(), ['id' => $project->id]) }}
    @include('partials.heading_separator')
    {{ $task->name_short() }}
    @include('task.partials.starred_task')
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

@section('scripts')
    @include('partials.markdown_editor', ['id' => 'content'])
@stop