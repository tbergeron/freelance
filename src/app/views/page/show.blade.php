@extends('layouts.master')

@section('title')
{{ trans('page.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name_short(), ['id' => $project->id]) }}
    @include('partials.heading_separator')
    {{ $page->name_short() }}
</h2>

<div class="col-md-8">
    <div class="paper-container">
        <div class="paper">
            <div class="inner-paper">
                <h4>{{ $page->name }}</h4>
                <div class="paper-content">
                    {{ Markdown::render($page->content) }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-2">
</div>
<div class="col-md-2">
    <a title="{{ trans('page.edit') }}" href="{{ URL::action('PageController@getEdit', ['id' => $page->id]) }}" class="btn btn-default">
            <i class="glyphicon glyphicon-edit"></i> Edit this page
        </a>
</div>
@stop