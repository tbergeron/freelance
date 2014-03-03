@extends('layouts.master')

@section('title')
{{ $user->full_name }} -
{{ trans('user.index') }}
-
@stop

@section('content')

<h2 class="section-heading">
    {{ $user->full_name }}
</h2>

{{ trans('user.last_activity') }} <strong>{{ $user->updated_at->diffForHumans() }}</strong>.

@stop

@section('scripts')
@include('partials.markdown_editor')
@stop