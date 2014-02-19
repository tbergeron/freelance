{{ trans('comment.posted_by', ['fullname' => $comment->user->full_name]) }}, {{ $comment->created_at->diffForHumans() }}
<br />
@if($comment->user_id == Auth::user()->id)
    {{ Html::linkAction('CommentController@getEdit', trans('comment.edit'), ['id' => $comment->id]) }}
    -
    <a href="{{ URL::action('CommentController@getDestroy', $comment->id) }}" onclick="return confirm('{{ trans('comment.destroy_question') }}')">
        {{ trans('comment.destroy') }}
    </a>
@endif
<br />
{{ Markdown::render($comment->content) }}