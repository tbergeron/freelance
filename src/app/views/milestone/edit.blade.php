@extends('layouts.master')

@section('title')
{{ $milestone->name }} -
{{ trans('milestone.index') }}
-
@stop

@section('content')

<h2>{{ $milestone->name }}</h2>

@include('partials.messages')

{{ Form::model($milestone, ['action' => ['MilestoneController@postUpdate', $milestone->id], 'files' => true]) }}

    @include('milestone.partials.form')

{{ Form::close() }}

@stop