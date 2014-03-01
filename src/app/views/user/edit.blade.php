@extends('layouts.master')

@section('title')
{{ $user->full_name }} -
{{ trans('user.index') }}
-
@stop

@section('content')

{{ Form::model($user, ['action' => ['UserController@postUpdate', $user->id]]) }}

<h2 class="section-heading">
    {{ $user->full_name }}
    <div class="pull-right">
        {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
        <a href="{{ URL::action('UserController@getDestroy', $user->id) }}" class="btn btn-danger btn-default" onclick="return confirm('{{ trans('user.destroy_question', ['name' => $user->full_name]) }}')">
            {{ trans('user.destroy') }}
        </a>
    </div>
</h2>

@include('user.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
@include('partials.markdown_editor')
@stop