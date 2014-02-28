@foreach ($task->comments as $comment)
    @include('comment.partials.comment')
@endforeach

@unless(count($task->comments))
{{ trans('comment.nothing_yet') }}
@endunless

<hr/>

<h3>{{ trans('comment.create') }}</h3>

@include('comment.partials.form')