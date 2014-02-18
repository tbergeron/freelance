<?php

class ProjectController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $projects = Project::all();
        return View::make('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        return View::make('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore()
    {
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
        $project = Project::findOrFail($id);
        return View::make('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
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
        $project = Project::findOrFail($id);
        $project->delete();

        return Redirect::action('ProjectController@getIndex')
            ->withMessage(trans('project.destroy_success'))->withType('success');
    }

}
