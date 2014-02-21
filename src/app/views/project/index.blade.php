@extends('layouts.master')

@section('title')
    {{ trans('project.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ trans('project.heading') }}
    <div class="pull-right">
        {{ Html::linkAction('ProjectController@getCreate', trans('project.create'), null, ['class' => 'btn btn-default']) }}
    </div>
</h2>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>{{ trans('project.code') }}</th>
            <th>{{ trans('project.name') }}</th>
            <th style="width: 12%;">{{ trans('project.last_update') }}</th>
            <th style="width: 23%;">{{ trans('project.actions') }}</th>
        </tr>

        @foreach ($projects as $project)

        <tr>
            <td>{{ $project->code }}</td>
            <td>{{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}</td>
            <td>{{ $project->updated_at->diffForHumans() }}</td>
            <td style="text-align: center">
                {{ Html::linkAction('TaskController@getProject', trans('project.tasks'), ['id' => $project->id], ['class' => 'btn btn-success btn-sm']) }}
                {{ Html::linkAction('MilestoneController@getIndex', trans('project.milestones'), ['id' => $project->id], ['class' => 'btn btn-success btn-sm']) }}

                <a href="{{ URL::action('ProjectController@getEdit', ['id' => $project->id]) }}" title="{{ trans('project.edit') }}" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>

                <a href="{{ URL::action('ProjectController@getDestroy', $project->id) }}" title="{{ trans('project.edit') }}" class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('project.destroy_question', ['name' => $project->name]) }}')">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            </td>
        </tr>

        @endforeach
    </table>
</div>

@stop