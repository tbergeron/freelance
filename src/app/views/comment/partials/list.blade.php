<h3>{{ trans('comment.create') }}</h3>
@include('comment.partials.form')

<ul>
    @foreach ($task->comments as $comment)

    <li>
        @include('comment.partials.comment')
    </li>

    @endforeach
</ul>