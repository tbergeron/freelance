@extends('layouts.master')

@section('title')
{{ $project->name }} -
{{ trans('project.index') }}
-
@stop

@section('content')

{{ Form::model($project, ['action' => ['ProjectController@postUpdate', $project->id]]) }}

    <h2 class="section-heading">
        {{ $project->name }}
        <div class="pull-right">
            {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
            <a href="{{ URL::action('ProjectController@getDestroy', $project->id) }}" class="btn btn-danger btn-default" onclick="return confirm('{{ trans('project.destroy_question', ['name' => $project->name]) }}')">
                {{ trans('project.destroy') }}
            </a>
        </div>
    </h2>

    @include('project.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
    @include('partials.markdown_editor')
@stop