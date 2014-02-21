@extends('layouts.master')

@section('title')
{{ trans('comment.edit_title') }}
-
@stop

@section('content')

<h2>{{ trans('comment.comment_on') }} {{ $task->name }}</h2>

{{ Form::model($comment, ['action' => ['CommentController@postUpdate', $comment->id]]) }}

@include('comment.partials.form')

{{ Form::close() }}

@stop