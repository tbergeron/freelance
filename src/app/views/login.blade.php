@extends('layouts.master')

@section('content')

{{ Form::open(['action' => 'UserController@getLogin']) }}
   <h2>{{ trans('app.please_login') }}</h2>

	@include('partials.messages')
 
   {{ Form::text('email', null, ['placeholder' => trans('app.email'), 'class' => 'form-control']) }}
   {{ Form::password('password', ['placeholder' => trans('app.password'), 'class' => 'form-control']) }}
 
   {{ Form::submit(trans('app.login')) }}
{{ Form::close() }}

@stop