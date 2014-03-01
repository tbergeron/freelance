@extends('layouts.master')

@section('title')
{{ trans('user.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ trans('user.heading') }}
    <div class="pull-right">
        {{ Html::linkAction('UserController@getCreate', trans('user.create'), null, ['class' => 'btn btn-default']) }}
    </div>
</h2>

@include('user.partials.list', ['show_actions' => true])

@stop