@extends('layouts.master')

@section('content')

<div class="page-header">
  <h1>{{ Config::get('app.name') }}</h1>
</div>

@include('partials.messages')

{{ trans('app.welcome') }}

@stop