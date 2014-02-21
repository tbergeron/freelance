<h3>{{ trans('comment.create') }}</h3>

@foreach ($task->comments as $comment)
    <div class="well">
        @include('comment.partials.comment')
    </div>
@endforeach

@unless(count($task->comments))
{{ trans('comment.nothing_yet') }}
@endunless

<hr/>

@include('comment.partials.form')