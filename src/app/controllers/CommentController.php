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
        $data = $this->prepareData();
        
        $task = Task::findOrFail($data['task_id']);

        if (!Permission::check($task->project->id, true, false))
            return Permission::kickOut();

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

        if (!Permission::check($comment->project_id, true, false))
            return Permission::kickOut();

        if ($comment->user_id = Auth::user()->id) {
            $task = $comment->task;
            $edit = true;

            if (Request::ajax()) {
                // respond to AJAX requests by simply outputting the form
                return View::make('comment.partials.form', compact('comment', 'task', 'edit'));
            } else {
                return View::make('comment.edit', compact('comment', 'task', 'edit'));
            }
        } else {
            return Permission::kickOut();
        }
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

        if (!Permission::check($comment->project_id, true, false))
            return Permission::kickOut();

        $data = $this->prepareData();

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

        if (!Permission::check($comment->project_id, true, false))
            return Permission::kickOut();

        $comment->delete();

        return Redirect::action('TaskController@getShow', ['id' => $comment->task->id])
            ->withMessage(trans('comment.destroy_success'))->withType('danger');
    }

    /**
     * Prepare comment data and update task.
     *
     * @return array
     */
    private function prepareData()
    {
        // assigning user to comment
        $data = Input::all();
        $data['user_id'] = Auth::user()->id;

        return $data;
    }

}