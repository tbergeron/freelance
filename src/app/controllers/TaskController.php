<?php

class TaskController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($project_id = null)
    {
        if (($project_id) && (!Permission::check($project_id, true, false)))
            return Permission::kickOut();

        // todo : keep filters in sessions
        list($all, $closed, $tasks, $project) = $this->taskFilter($project_id);
        return View::make('task.index', compact('project', 'tasks', 'closed', 'all'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $project_id
     * @return Response
     */
    public function getCreate($project_id = null)
    {
        if (($project_id) && (!Permission::check($project_id, true, true)))
            return Permission::kickOut();

        if ($project_id)
            $project = Project::findOrFail($project_id);

        return View::make('task.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore()
    {
        if (!Permission::check(Input::get('project_id'), true, true))
            return Permission::kickOut();

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

        if (!Permission::check($task->project_id, true, false))
            return Permission::kickOut();

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

        if (!Permission::check($task->project_id, true, true))
            return Permission::kickOut();

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

        if (!Permission::check($task->project_id, true, true))
            return Permission::kickOut();

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

        if (!Permission::check($task->project_id, true, true))
            return Permission::kickOut();

        $project_id = $task->project_id;
        $task->delete();

        return Redirect::action('TaskController@getIndex', ['project_id' => $project_id])
            ->withMessage(trans('task.destroy_success'))->withType('danger');
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

        if (!Permission::check($task->project_id, true, true))
            return Permission::kickOut();

        $task->is_closed = true;
        $task->save();
        
        if ($from_task)
            return Redirect::action('TaskController@getShow', ['id' => $task->id])
                    ->withMessage(trans('task.closed_success'))->withType('success');    
        else
            return Redirect::action('TaskController@getIndex', ['project_id' => $task->project->id])
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

        if (!Permission::check($task->project_id, true, true))
            return Permission::kickOut();

        $task->is_closed = false;
        $task->save();
        
        if ($from_task)
            return Redirect::action('TaskController@getShow', ['id' => $task->id])
                    ->withMessage(trans('task.reopen_success'))->withType('success');
        else
            return Redirect::action('TaskController@getIndex', ['project_id' => $task->project->id])
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

            // don't have to check for permissions here since it's already done in the action
            $tasks = $tasks->paginate(Task::$items_per_page);

            return [$all, $closed, $tasks, $project];

        } else {
            $project_ids = Auth::user()->getAvailableProjectIds();

            if ($all) {
                $tasks = Task::whereIn('project_id', $project_ids)->orderBy('updated_at', 'desc')
                                ->paginate(Task::$items_per_page);

            } else {
                $tasks = Task::whereIn('project_id', $project_ids)->where('is_closed', $closed)
                                ->orderBy('updated_at', 'desc')->paginate(Task::$items_per_page);
            }

            return [$all, $closed, $tasks, null];
        }
    }
}
