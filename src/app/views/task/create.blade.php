@extends('layouts.master')

@section('title')
{{ trans('task.create') }} -
@stop

@section('content')

{{ Form::open(['action' => 'TaskController@postStore']) }}

<h2>
    {{ trans('task.create') }}
    <div class="pull-right">
        {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
    </div>
</h2>

@include('task.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
    @include('partials.markdown_editor', ['taller' => true])
@stop