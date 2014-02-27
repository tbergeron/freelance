@extends('layouts.master')

@section('title')
{{ trans('page.index') }} -
@stop

@section('content')

<div class="page-top-container">
    <div class="col-lg-9">
        <div class="paper-container">
            <div class="paper">
                <div class="inner-paper">
                    <h4>
                        {{ $page->name }}<br/>
                        @include('page.partials.display_project')
                    </h4>
                    <div class="paper-content">
                        {{ Markdown::render($page->content) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 page-sidebar">
        <div class="jumbotron">
            <h4>{{ trans('page.want_to_make_changes') }}</h4>

            <p>{{ trans('page.last_update') }} {{ $page->updated_at->diffForHumans() }}.</p>

            <a title="{{ trans('page.edit') }}" href="{{ URL::action('PageController@getEdit', ['id' => $page->id]) }}" class="btn btn-default">
                {{ trans('page.edit_page') }}
            </a>
        </div>
    </div>
    <div class="clear"></div>
</div>

@stop