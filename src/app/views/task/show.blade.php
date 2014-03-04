@extends('layouts.master')

@section('title')
{{ $task->name }} -
@stop

@section('content')
<div class="row">
    <div class="col-lg-10">
        <h2 class="section-heading">
            {{ $task->name_short() }}
            @include('task.partials.starred_task')
            <div class="pull-right">
                @include('task.partials.close_toggle_link', ['from_task' => true])
                <a title="{{ trans('task.edit') }}" href="{{ URL::action('TaskController@getEdit', ['id' => $task->id]) }}" class="btn btn-default">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
            </div>
        </h2>

        <div class="table-responsive task-info-table">
            <table class="table">
                <tr class="warning">
                    <th>{{ trans('task.code') }}</th>
                    <td>{{ $task->code() }}</td>
                    <th>{{ trans('task.assignee') }}</th>
                    <td>
                        @include('user.partials.profile_link', ['user' => $task->user])
                        @include('user.partials.avatar', ['user' => $task->user, 'link' => true])
                    </td>
                </tr>
                <tr class="warning">
                    <th>{{ trans('task.status') }}</th>
                    <td>@include('task.partials.state')</td>
                    <th>{{ trans('task.milestone') }}</th>
                    <td>
                        @if($task->milestone)
                        {{ Html::linkAction('MilestoneController@getShow', $task->milestone->name, ['id' => $task->milestone->id]) }}
                        @else {{ trans('task.none') }} @endif
                    </td>
                </tr>
                <tr class="warning">
                    <th>{{ trans('task.created_at') }}</th>
                    <td>{{ $task->created_at->diffForHumans() }}</td>
                    <th>{{ trans('task.last_update') }}</th>
                    <td>{{ $task->updated_at->diffForHumans() }}</td>
                </tr>
            </table>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h4>{{ $task->name }}</h4>

                <div class="markdown_content">
                    {{ Markdown::render($task->description) }}
                </div>
            </div>
        </div>


        <hr/>

        @include('comment.partials.list')
    </div> <!-- /col-lg-10 -->
    <div class="col-lg-2">
        @include('project.partials.sidebar')
    </div>
</div>

@stop

@section('scripts')
    @include('partials.markdown_editor')
@stop