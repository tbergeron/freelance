@extends('layouts.master')

@section('title')
{{ $page->name }} -
{{ trans('page.index') }}
-
@stop

@section('content')

{{ Form::model($page, ['action' => ['PageController@postUpdate', $page->id]]) }}

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
                                {{ Form::label('content', trans('page.content')) }}
                                <div class="controls">
                                    {{ $errors->first('content') }}
                                    <div id="content" class="markdown_editor form-control"></div>
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
                <h4>{{ trans('page.want_to_make_changes') }}</h4>

                <p>{{ trans('page.last_update') }} {{ $page->updated_at->diffForHumans() }}.</p>

                {{ Form::hidden('project_id', ((isset($project)) ? $project->id : null)) }}

                <div class="form-group">
                    {{ Form::submit(trans('page.save_page'), ['class' => 'btn btn-primary']) }}
                </div>

                <a title="{{ trans('page.cancel_changes') }}" href="{{ URL::action('PageController@getShow', ['id' => $page->id]) }}" class="btn btn-link">
                    {{ trans('page.cancel_changes') }}
                </a>

                <a title="{{ trans('page.delete') }}" href="{{ URL::action('PageController@getDestroy', ['id' => $page->id]) }}" class="btn btn-link btn-link-danger" onclick="return confirm('{{ trans('page.destroy_question', ['name' => $page->name]) }}')">
                    {{ trans('page.delete_page') }}
                </a>

            </div>
        </div>
        <div class="clear"></div>
    </div>

{{ Form::close() }}

@stop

@section('scripts')
@include('partials.markdown_editor', ['id' => 'content'])
@stop