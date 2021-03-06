<?php

class ProjectController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $projects = Auth::user()->available_projects();
        return View::make('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        if (!Permission::checkIfAdmin())
            return Permission::kickOut();

        return View::make('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore()
    {
        if (!Permission::checkIfAdmin())
            return Permission::kickOut();

        $project = new Project;

        if ($project->save(Input::all()))
            return Redirect::action('ProjectController@getIndex')
                ->withMessage(trans('project.create_success'))->withType('success');
        else
            return Redirect::back()->withInput()->withErrors($project->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {
        if (!Permission::check($id, true, false))
            return Permission::kickOut();

        $project = Project::findOrFail($id);
        $tasks = $project->tasks()->limit(Task::$items_per_page)->get();
        return View::make('project.show', compact('project', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        if (!Permission::check($id, true, true))
            return Permission::kickOut();

        $project = Project::findOrFail($id);
        return View::make('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postUpdate($id)
    {
        if (!Permission::check($id, true, true))
            return Permission::kickOut();

        $project = Project::findOrFail($id);

        if ($project->save(Input::all()))
            return Redirect::action('ProjectController@getIndex')
                ->withMessage(trans('project.update_success'))->withType('success');
        else
            return Redirect::back()->withInput()->withErrors($project->getErrors());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDestroy($id)
    {
        if (!Permission::check($id, true, true))
            return Permission::kickOut();

        $project = Project::findOrFail($id);
        $project->delete();

        return Redirect::action('ProjectController@getIndex')
            ->withMessage(trans('project.destroy_success'))->withType('danger');
    }

    /***
     * Star/Toggle a project (ajax request)
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStare()
    {
        $user = Auth::user();
        $project = Project::findOrFail(Input::get('id'));

        if ($user && $project) {
            if (Permission::check($project->id, true, false)) {
                $is_starred = false;

                $starred = StarredProject::where('user_id', $user->id)->where('project_id', $project->id)->first();

                if ($starred) {
                    $starred->delete();
                } else {
                    $is_starred = true;
                    $starred = new StarredProject;
                    $starred->user_id = $user->id;
                    $starred->project_id = $project->id;
                    $starred->save();
                }

                return Response::json(['success' => true, 'starred' => $is_starred]);
            }
        }

        return Response::json(['success' => false]);
    }

}
