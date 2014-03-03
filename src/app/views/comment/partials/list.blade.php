<h3>{{ trans('comment.comments') }}</h3>

<div class="task-comments">
@foreach ($task->comments as $comment)
    @include('comment.partials.comment')
@endforeach
</div>

@unless(count($task->comments))
{{ trans('comment.nothing_yet') }}
@endunless

<hr/>

@include('comment.partials.form')