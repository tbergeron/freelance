@extends('layouts.master')

@section('title')
{{ trans('user.create') }} -
@stop

@section('content')

{{ Form::open(['action' => 'UserController@postStore']) }}

<h2>
    {{ trans('user.create') }}
    <div class="pull-right">
        {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
    </div>
</h2>

@include('user.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
@include('partials.markdown_editor')
@stop