<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-right" style="margin-top:-5px">
            @if($comment->user_id == Auth::user()->id)

            <a data-id="{{ $comment->id }}" href="{{ URL::action('CommentController@getEdit', ['id' => $comment->id]) }}" title="{{ trans('comment.edit') }}" class="btn btn-default btn-sm comment-edit">
                <i class="glyphicon glyphicon-edit"></i>
            </a>

            <a href="{{ URL::action('CommentController@getDestroy', $comment->id) }}" title="{{ trans('comment.destroy') }}" class="btn btn-default btn-sm" onclick="return confirm('{{ trans('comment.destroy_question') }}')">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
            @endif
        </div>
        <div class="comment-info">
            <strong>@include('user.partials.profile_link', ['user' => $comment->user])</strong>
            {{ trans('comment.commented') }}
            {{ $comment->created_at->diffForHumans() }}@if($comment->created_at != $comment->updated_at); {{ trans('comment.edited') }} {{ $comment->updated_at->diffForHumans() }}.@endif
        </div>

    </div>
    <div class="panel-body comment-content">
        <div class="markdown_content">
            {{ Markdown::render($comment->content) }}
        </div>
    </div>
</div>