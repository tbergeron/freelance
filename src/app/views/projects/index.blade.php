@extends('layouts.master')

@section('title')
    {{ trans('project.index') }} -
@stop

@section('content')

<h2>{{ trans('project.heading') }}</h2>

<div>
    {{ Html::linkAction('ProjectController@getCreate', trans('project.create')) }}
</div>

<br/>

@include('partials.messages')

@foreach ($projects as $project)

{{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
 -
{{ Html::linkAction('ProjectController@getEdit', trans('project.edit'), ['id' => $project->id]) }}

@endforeach

@stop