@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

<h2>{{ trans('task.heading') }}</h2>

<div>
    {{ Html::linkAction('TaskController@getCreate', trans('task.create')) }}
</div>

<br/>

@include('partials.messages')

@include('task.partials.list')

@stop