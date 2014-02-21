@extends('layouts.master')

@section('content')

{{ Form::open(['action' => 'UserController@getLogin', 'class' => 'form-signin', 'role' => 'form']) }}
<h2 class="please-login text-center">{{ trans('app.please_login') }}</h2>

<br/>
{{ Form::text('email', null, array('placeholder' => trans('app.email'), 'class' => 'form-control')) }}
<br/>
{{ Form::password('password', array('placeholder' => trans('app.password'), 'class' => 'form-control')) }}

<br/>

{{ Form::submit(trans('app.login'), array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}

@stop