@extends('layouts.master')

@section('title')
{{ trans('app.dashboard') }} -
@stop

@section('content')

<h2>{{ trans('app.dashboard') }}</h2>

@include('partials.messages')

<div>
    {{ Html::linkAction('ProjectController@getIndex', 'Projects') }}
</div>

<br />

<div>
    {{ trans('app.welcome') }}
</div>

@stop