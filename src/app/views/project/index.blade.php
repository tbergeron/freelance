@extends('layouts.master')

@section('title')
    {{ trans('project.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ trans('project.heading') }}
    <div class="pull-right">
        {{ Html::linkAction('ProjectController@getCreate', trans('project.create'), null, ['class' => 'btn btn-default']) }}
    </div>
</h2>

@include('project.partials.list', ['show_actions' => true])

@stop