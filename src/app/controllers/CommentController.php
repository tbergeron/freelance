<?php
use Carbon\Carbon;

class CommentController extends BaseController {

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore()
    {
        $comment = new Comment;
        $data = $this->prepareDataAndUpdateTask();

        if ($comment->save($data))
        return Redirect::back()
            ->withMessage(trans('comment.success'))->withType('success');
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
        $task = $comment->task;
        return View::make('comment.edit', compact('comment', 'task'));
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
        $data = $this->prepareDataAndUpdateTask();

        if ($comment->save($data))
            return Redirect::action('TaskController@getShow', ['id' => $comment->task->id])
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

        return Redirect::action('TaskController@getShow', ['id' => $comment->task->id])
            ->withMessage(trans('comment.destroy_success'))->withType('danger');
    }

    /**
     * Prepare comment data and update task.
     *
     * @return array
     */
    private function prepareDataAndUpdateTask()
    {
        // assigning user to comment
        $data = Input::all();
        $data['user_id'] = Auth::user()->id;

        // updating task updated_at
        $task = Task::find(Input::get('task_id'));
        $task->updated_at = Carbon::now();
        $task->save();

        return $data;
    }

}