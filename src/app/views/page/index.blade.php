@extends('layouts.master')

@section('title')
{{ trans('page.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    @if(isset($project))
    {{ Html::linkAction('ProjectController@getShow', $project->name, ['id' => $project->id]) }}
    @include('partials.heading_separator')
    {{ trans('page.pages') }}
    @else
    {{ trans('page.heading') }}
    @endif
    <div class="pull-right">
        {{ Html::linkAction('PageController@getCreate', trans('page.create'), ((isset($project)) ? ['project_id' => $project->id] : null), ['class' => 'btn btn-default']) }}
    </div>
</h2>

@include('page.partials.list', ['show_actions' => true])

@stop