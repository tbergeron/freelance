@extends('layouts.master')

@section('title')
{{ trans('milestone.create') }} -
@stop

@section('content')

{{ Form::open(['action' => 'MilestoneController@postStore']) }}

    <h2>
        {{ trans('milestone.create') }}
        <div class="pull-right">
            {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
        </div>
    </h2>

    @include('milestone.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
    @include('partials.markdown_editor')
@stop