@extends('layouts.master')

@section('title')
{{ trans('comment.edit_title') }}
-
@stop

@section('content')

<h2>{{ trans('comment.comment_on') }} {{ $task->name }}</h2>

@include('comment.partials.form')

@stop