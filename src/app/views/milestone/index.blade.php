@extends('layouts.master')

@section('title')
    {{ trans('milestone.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
    {{ trans('milestone.milestones') }}
    <div class="pull-right">
        {{ Html::linkAction('MilestoneController@getCreate', trans('milestone.create'), ['project_id' => $project->id], ['class' => 'btn btn-default']) }}
    </div>
</h2>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>{{ trans('milestone.name') }}</th>
            <th style="width: 10%;">{{ trans('milestone.last_update') }}</th>
            <th style="width: 25%;">{{ trans('milestone.actions') }}</th>
        </tr>

        @foreach ($milestones as $milestone)

        <tr>
            <td>{{ Html::linkAction('MilestoneController@getShow', $milestone->name, ['id' => $milestone->id]) }}</td>
            <td>{{ $milestone->updated_at->diffForHumans() }}</td>
            <td>
                {{ Html::linkAction('MilestoneController@getEdit', trans('milestone.edit'), ['id' => $milestone->id], ['class' => 'btn btn-default btn-sm']) }}
                <a href="{{ URL::action('MilestoneController@getDestroy', $milestone->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('milestone.destroy_question', ['name' => $milestone->name]) }}')">
                    {{ trans('milestone.destroy') }}
                </a>
            </td>
        </tr>

        @endforeach

        @unless(count($milestones))
        <tr>
            <td colspan="3">{{ trans('milestone.no_records') }}</td>
        </tr>
        @endunless
    </table>
</div>

@stop