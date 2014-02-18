<?php

class CommentController extends BaseController {

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore()
    {
        $comment = new Comment;
        
        // assigning user to comment
        $data = Input::all();
        $data['user_id'] = Auth::user()->id;

        if ($comment->save($data))
            return Redirect::back();
        else
            return Redirect::back()->withInput()->withErrors($comment->getErrors());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $comment = Comment::findOrFail($id);
        return View::make('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postUpdate($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->save(Input::all()))
            return Redirect::action('CommentController@getIndex')
                ->withMessage(trans('comment.update_success'))->withType('success');

        else
            return Redirect::back()->withInput()->withErrors($comment->getErrors());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDestroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return Redirect::action('CommentController@getIndex')
            ->withMessage(trans('comment.destroy_success'))->withType('success');
    }

}