@extends('layouts.master')

@section('title')
{{ trans('milestone.create') }} -
@stop

@section('content')

<h2>{{ trans('milestone.create') }}</h2>

{{ Form::open(['action' => 'MilestoneController@postStore']) }}

    @include('milestone.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
    @include('partials.markdown_editor')
@stop