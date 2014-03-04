@extends('layouts.master')

@section('title')
    {{ trans('milestone.index') }} -
@stop

@section('content')

<div class="row">
    <div class="col-lg-10">
        <h2 class="section-heading">
            {{ trans('milestone.milestones') }}
            <div class="pull-right">
                {{ Html::linkAction('MilestoneController@getCreate', trans('milestone.create'), ['project_id' => $project->id], ['class' => 'btn btn-default']) }}
            </div>
        </h2>

        @include('milestone.partials.list', ['show_actions' => true])
    </div> <!-- /col-lg-10 -->
    <div class="col-lg-2">
        @include('project.partials.sidebar')
    </div>
</div>

@stop