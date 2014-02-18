<h3>{{ trans('comment.create') }}</h3>
@include('comment.partials.form')

<hr />

<ul>
    @foreach ($task->comments as $comment)

    <li>
        {{ trans('comment.posted_by', ['fullname' => $comment->user->full_name]) }}, {{ $comment->created_at->diffForHumans() }}
        <br />
        {{ $comment->content }}
    </li>

    @endforeach
</ul>