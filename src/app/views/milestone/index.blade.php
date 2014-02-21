@extends('layouts.master')

@section('title')
    {{ trans('milestone.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
    @include('partials.heading_separator')
    {{ trans('milestone.milestones') }}
    <div class="pull-right">
        {{ Html::linkAction('MilestoneController@getCreate', trans('milestone.create'), ['project_id' => $project->id], ['class' => 'btn btn-default']) }}
    </div>
</h2>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>{{ trans('milestone.name') }}</th>
            <th style="width: 25%;">{{ trans('milestone.last_update') }}</th>
            <th style="width: 11%;">{{ trans('milestone.actions') }}</th>
        </tr>

        @foreach ($milestones as $milestone)

        <tr>
            <td>{{ Html::linkAction('MilestoneController@getShow', $milestone->name, ['id' => $milestone->id]) }}</td>
            <td>{{ $milestone->updated_at->diffForHumans() }}</td>
            <td>
                <a href="{{ URL::action('MilestoneController@getEdit', ['id' => $milestone->id]) }}" title="{{ trans('milestone.edit') }}" class="btn btn-primary btn-sm">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>

                <a href="{{ URL::action('MilestoneController@getDestroy', $milestone->id) }}" title="{{ trans('milestone.destroy') }}" class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('milestone.destroy_question', ['name' => $milestone->name]) }}')">
                    <i class="glyphicon glyphicon-remove"></i>
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