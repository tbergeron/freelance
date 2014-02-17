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

<ul>
    @foreach ($projects as $project)

    <li>
        {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
         -
        {{ Html::linkAction('ProjectController@getEdit', trans('project.edit'), ['id' => $project->id]) }}
         -
        <a href="{{ URL::action('ProjectController@getDestroy', $project->id) }}" onclick="return confirm('{{ trans('project.destroy_question', ['name' => $project->name]) }}')">
            {{ trans('project.destroy') }}
        </a>
    </li>

    @endforeach
</ul>

@stop