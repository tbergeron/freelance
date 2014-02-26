<?php

class TaskController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    // TODO: Could we merge getIndex and getProject?
    public function getIndex()
    {
        // todo : keep filters in sessions
        list($all, $closed, $tasks) = $this->taskFilter();
        return View::make('task.index', compact('tasks', 'closed', 'all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $project_id
     * @return Response
     */
    public function getCreate($project_id = null)
    {
        return View::make('task.create', compact('project_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore()
    {
        $task = new Task;

        if ($task->save(Input::all()))
            return Redirect::action('TaskController@getShow', ['id' => $task->id])
                ->withMessage(trans('task.create_success'))->withType('success');

        else
            return Redirect::back()->withInput()->withErrors($task->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {
        $task = Task::findOrFail($id);
        $project = $task->project;
        return View::make('task.show', compact('task', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $task = Task::findOrFail($id);
        $project = $task->project;
        $milestone_id = ($task->milestone) ? $task->milestone->id : null;

        return View::make('task.edit', compact('task', 'project', 'milestone_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postUpdate($id)
    {
        $task = Task::findOrFail($id);

        if ($task->save(Input::all()))
            return Redirect::action('TaskController@getShow', ['id' => $task->id])
                ->withMessage(trans('task.update_success'))->withType('success');

        else
            return Redirect::back()->withInput()->withErrors($task->getErrors());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDestroy($id)
    {
        $task = Task::findOrFail($id);
        $project_id = $task->project_id;
        $task->delete();

        return Redirect::action('TaskController@getProject', ['project_id' => $project_id])
            ->withMessage(trans('task.destroy_success'))->withType('danger');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $project_id
     * @return Response
     */
    public function getProject($project_id)
    {
        list($all, $closed, $tasks, $project) = $this->taskFilter($project_id);
        return View::make('task.project', compact('project', 'tasks', 'closed', 'all'));
    }

    /***
     * Close a task
     * @param $id
     * @param bool $from_task
     * @return Response
     */
    public function getClose($id, $from_task = false)
    {
        $task = Task::findOrFail($id);
        $task->is_closed = true;
        $task->save();
        
        if ($from_task)
            return Redirect::action('TaskController@getShow', ['id' => $task->id])
                    ->withMessage(trans('task.closed_success'))->withType('success');    
        else
            return Redirect::action('TaskController@getProject', ['project_id' => $task->project->id])
                                ->withMessage(trans('task.closed_success'))->withType('success');
    }

    /***
     * Reopen a task
     * @param $id
     * @param bool $from_task
     * @return Response
     */
    public function getReopen($id, $from_task = false)
    {
        $task = Task::findOrFail($id);
        $task->is_closed = false;
        $task->save();
        
        if ($from_task)
            return Redirect::action('TaskController@getShow', ['id' => $task->id])
                    ->withMessage(trans('task.reopen_success'))->withType('success');
        else
            return Redirect::action('TaskController@getProject', ['project_id' => $task->project->id])
                                ->withMessage(trans('task.reopen_success'))->withType('success');
    }

    /***
     * Star/Toggle a task (ajax request)
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStare()
    {
        $user = Auth::user();
        $task = Task::findOrFail(Input::get('id'));

        if ($user && $task) {
            $is_starred = false;

            $starred = StarredTask::where('user_id', $user->id)->where('task_id', $task->id)->first();

            if ($starred) {
                $starred->delete();
            } else {
                $is_starred = true;
                $starred = new StarredTask;
                $starred->user_id = $user->id;
                $starred->task_id = $task->id;
                $starred->save();
            }

            return Response::json(['success' => true, 'starred' => $is_starred]);
        } else {
            return Response::json(['success' => false]);
        }
    }

    /**
     * Handle the query to the database and return all needed values for view.
     *
     * @param  int  $project_id
     * @return list($all, $closed, $tasks, [$project])
     */
    private function taskFilter($project_id = null)
    {
        $all = (Input::has('all')) ? true : false;
        $closed = (Input::has('closed') && !$all) ? true : false;

        if ($project_id) {
            $project = Project::find($project_id);

            $tasks = $project->tasks();

            if (!$all)
                $tasks = $tasks->where('is_closed', $closed);

            $tasks = $tasks->paginate(Task::$items_per_page);

            return [$all, $closed, $tasks, $project];

        } else {
            if ($all)
                $tasks = Task::paginate(Task::$items_per_page);
            else
                $tasks = Task::where('is_closed', $closed)->paginate(Task::$items_per_page);

            return [$all, $closed, $tasks];
        }
    }
}
