@extends('layouts.master')

@section('title')
{{ trans('page.index') }} -
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('ProjectController@getShow', $project->name_short(), ['id' => $project->id]) }}
    @include('partials.heading_separator')
    {{ $page->name_short() }}
    <div class="pull-right">
        <a title="{{ trans('page.edit') }}" href="{{ URL::action('PageController@getEdit', ['id' => $page->id]) }}" class="btn btn-default">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    </div>
</h2>

<h4>{{ $page->name }}</h4>

{{ Markdown::render($page->content) }}

@stop