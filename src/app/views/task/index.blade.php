@extends('layouts.master')

@section('title')
{{ trans('task.index') }} -
@stop

@section('content')

@if(isset($project))
<div class="row">
    <div class="col-sm-10">
@endif
        <h2>
            {{ trans('task.tasks') }}
        </h2>

        @include('task.partials.filter_bar')

        @include('task.partials.list', ['show_actions' => true, 'show_states' => true])

        {{ $tasks->links('partials.pagination') }}
@if(isset($project))
    </div> <!-- /col-lg-10 -->
    <div class="col-sm-2">
        @include('project.partials.sidebar')
    </div>
</div>
@endif

@stop