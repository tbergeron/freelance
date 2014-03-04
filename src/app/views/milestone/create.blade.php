@extends('layouts.master')

@section('title')
{{ trans('milestone.create') }} -
@stop

@section('content')

<div class="row">
    <div class="col-sm-10">
        {{ Form::open(['action' => 'MilestoneController@postStore']) }}

            <h2>
                {{ trans('milestone.create') }}
                <div class="pull-right">
                    {{ Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) }}
                </div>
            </h2>

            @include('milestone.partials.form')

        {{ Form::close() }}
    </div> <!-- /col-lg-10 -->
    <div class="col-sm-2">
        @include('project.partials.sidebar')
    </div>
</div>
@stop

@section('scripts')
    @include('partials.markdown_editor')
@stop