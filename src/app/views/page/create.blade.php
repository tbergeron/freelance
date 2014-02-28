@extends('layouts.master')

@section('title')
{{ trans('page.create') }} -
@stop

@section('content')

{{ Form::open(['action' => 'PageController@postStore']) }}

<div class="page-top-container">
    <div class="col-lg-9">
        <div class="paper-container">
            <div class="paper">
                <div class="inner-paper">
                    <br/>
                    <div class="form-group @if($errors->has('name')) has-feedback has-error @endif">
                        {{ Form::label('name', trans('page.name')) }} @include('page.partials.display_project')
                        {{ $errors->first('name') }}
                        <div class="controls">
                            {{ Form::text('name', null, ['placeholder' => trans('page.name_placeholder'), 'class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="paper-content">
                        <div class="form-group @if($errors->has('content')) has-feedback has-error @endif">
                            <div class="controls">
                                {{ $errors->first('content') }}
                                {{ Form::textarea('content', null, ['placeholder' => trans('page.content_placeholder'), 'class' => 'form-control content']) }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 page-sidebar">
        <div class="jumbotron">
            <h4>{{ trans('page.save_changes') }}</h4>

            {{ Form::hidden('project_id', $project->id) }}
            <br/>
            <div class="form-group">
                {{ Form::submit(trans('page.save_page'), ['class' => 'btn btn-primary']) }}
            </div>

        </div>
    </div>
    <div class="clear"></div>
</div>

{{ Form::close() }}

@stop

@section('scripts')
@include('partials.markdown_editor', ['taller' => true])
@stop