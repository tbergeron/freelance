<h3>{{ trans('comment.create') }}</h3>

@foreach ($task->comments as $comment)
    @include('comment.partials.comment')
@endforeach

@unless(count($task->comments))
{{ trans('comment.nothing_yet') }}
@endunless

<hr/>

@include('comment.partials.form')