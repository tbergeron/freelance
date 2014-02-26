@extends('layouts.master')

@section('title')
{{ $page->name }} -
{{ trans('page.index') }}
-
@stop

@section('content')

<h2 class="section-heading">
    {{ Html::linkAction('PageController@getShow', $page->name, ['id' => $page->id]) }}
    @include('partials.heading_separator')
    {{ $page->name_short() }}
    <div class="pull-right">
        <a href="{{ URL::action('PageController@getDestroy', $page->id) }}" class="btn btn-danger" onclick="return confirm('{{ trans('page.destroy_question', ['name' => $page->name]) }}')">
            {{ trans('page.destroy') }}
        </a>
    </div>
</h2>

{{ Form::model($page, ['action' => ['PageController@postUpdate', $page->id]]) }}

@include('page.partials.form')

{{ Form::close() }}

@stop

@section('scripts')
@include('partials.markdown_editor', ['id' => 'content'])
@stop