@extends('layouts.master')

@section('title')
{{ trans('milestone.create') }} -
@stop

@section('content')

@include('partials.messages')

<h2>{{ trans('milestone.create') }}</h2>

{{ Form::open(['action' => 'MilestoneController@postStore', 'files' => true]) }}

    @include('milestone.partials.form')

{{ Form::close() }}

@stop