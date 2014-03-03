@extends('layouts.master')

@section('title')
{{ trans('user.edit_profile') }} -
{{ trans('user.index') }}
-
@stop

@section('content')

{{ Form::model($user, ['action' => 'UserController@postProfile']) }}

<h2 class="section-heading">
    <div class="pull-right">
        {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
    </div>
    {{ trans('user.edit_profile') }}
</h2>

@include('user.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
@include('partials.markdown_editor')
@stop