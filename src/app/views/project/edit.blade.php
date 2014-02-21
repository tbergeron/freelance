@extends('layouts.master')

@section('title')
{{ $project->name }} -
{{ trans('project.index') }}
-
@stop

@section('content')

<h2 class="section-heading">
    {{ $project->name }}
    <div class="pull-right">
        <a href="{{ URL::action('ProjectController@getDestroy', $project->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('project.destroy_question', ['name' => $project->name]) }}')">
            {{ trans('project.destroy') }}
        </a>
    </div>
</h2>

{{ Form::model($project, ['action' => ['ProjectController@postUpdate', $project->id]]) }}

    @include('project.partials.form')

{{ Form::close() }}

@stop