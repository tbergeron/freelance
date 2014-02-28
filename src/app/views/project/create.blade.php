@extends('layouts.master')

@section('title')
{{ trans('project.create') }} -
@stop

@section('content')

{{ Form::open(['action' => 'ProjectController@postStore']) }}

    <h2>
        {{ trans('project.create') }}
        <div class="pull-right">
            {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
        </div>
    </h2>

    @include('project.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
    @include('partials.markdown_editor')
@stop