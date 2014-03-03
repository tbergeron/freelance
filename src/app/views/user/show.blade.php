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

<div class="row">
    <div class="col-lg-1">
        @include('user.partials.avatar', ['user' => $user])
    </div>
    <div class="col-lg-11">
        {{ trans('user.last_login') }} <strong>{{ $user->updated_at->diffForHumans() }}</strong>.
    </div>
</div>


@stop

@section('scripts')
@include('partials.markdown_editor')
@stop