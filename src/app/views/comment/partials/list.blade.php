<h3>{{ trans('comment.create') }}</h3>

<ul>
    @foreach ($task->comments as $comment)

    <li>
        @include('comment.partials.comment')
    </li>

    @endforeach
</ul>

<hr/>

@include('comment.partials.form')