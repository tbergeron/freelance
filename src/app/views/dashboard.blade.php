@extends('layouts.master')

@section('title')
    {{ trans('app.home_title') }}
    -
@stop

@section('content')

<div class="page-header">
    <h1>{{ trans('app.home_title') }}</h1>
</div>

@include('partials.messages')

{{ trans('app.welcome') }}

@stop