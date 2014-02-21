<div class="comment_info">
    <strong>
        {{ trans('comment.posted_by', ['fullname' => $comment->user->full_name]) }}, {{ $comment->created_at->diffForHumans() }}
    </strong>

    <div class="pull-right">
        @if($comment->user_id == Auth::user()->id)
            {{ Html::linkAction('CommentController@getEdit', trans('comment.edit'), ['id' => $comment->id], ['class' => 'btn btn-default btn-sm']) }}
            <a href="{{ URL::action('CommentController@getDestroy', $comment->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('comment.destroy_question') }}')">
                {{ trans('comment.destroy') }}
            </a>
        @endif
    </div>
</div>

{{ Markdown::render($comment->content) }}