@extends('layouts.master')

@section('title')
{{ $milestone->name }} -
{{ trans('milestone.index') }}
-
@stop

@section('content')

<div class="row">
    <div class="col-lg-10">
        {{ Form::model($milestone, ['action' => ['MilestoneController@postUpdate', $milestone->id], 'files' => true]) }}

        <h2>
            {{ $milestone->name }}
            <div class="pull-right">
                {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
            </div>
        </h2>

        @include('milestone.partials.form')

        {{ Form::close() }}
    </div> <!-- /col-lg-10 -->
    <div class="col-lg-2">
        @include('project.partials.sidebar')
    </div>
</div>

@stop

@section('scripts')
    @include('partials.markdown_editor')
@stop