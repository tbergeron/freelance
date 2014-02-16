@extends('layouts.master')

@section('content')

{{ Form::open(array('route' => 'admin_login', 'class' => 'form-signin', 'role' => 'form')) }}
   <h2 class="please-login text-center">{{ trans('app.please_login') }}</h2>

	@include('partials.messages')
 
   {{ Form::text('username', null, array('placeholder' => trans('app.username'), 'class' => 'form-control')) }}
   {{ Form::password('password', array('placeholder' => trans('app.password'), 'class' => 'form-control')) }}
 
   {{ Form::submit(trans('app.login'), array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}

@stop