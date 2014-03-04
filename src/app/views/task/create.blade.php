@extends('layouts.master')

@section('title')
{{ trans('task.create') }} -
@stop

@section('content')
<div class="row">
    <div class="col-sm-10">
@if(isset($project))

@endif

{{ Form::open(['action' => 'TaskController@postStore']) }}

<h2>
    {{ trans('task.create') }}
    <div class="pull-right">
        {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
    </div>
</h2>

@include('task.partials.form')

{{ Form::close() }}

@if(isset($project))

@endif
    </div> <!-- /col-lg-10 -->
    <div class="col-sm-2">
        @include('project.partials.sidebar')
    </div>
</div>
@stop

@section('scripts')
    @include('partials.markdown_editor', ['taller' => true])
@stop