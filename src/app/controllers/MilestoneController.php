<?php

class MilestoneController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getIndex($project_id)
    {
        $project = Project::find($project_id);
        $milestones = $project->milestones;
        
        return View::make('milestone.index', compact('project', 'milestones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate($project_id)
    {
        return View::make('milestone.create', compact('project_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore()
    {
        $milestone = new Milestone;

        if ($milestone->save(Input::all()))
            return Redirect::action('MilestoneController@getIndex', ['project_id' => Input::get('project_id')])
                ->withMessage(trans('milestone.create_success'))->withType('success');

        else
            return Redirect::back()->withInput()->withErrors($milestone->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {
        $milestone = Milestone::findOrFail($id);
        $project = $milestone->project;
        $tasks = $milestone->tasks;
        return View::make('milestone.show', compact('milestone', 'project', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $milestone = Milestone::findOrFail($id);
        $project = $milestone->project;
        return View::make('milestone.edit', compact('milestone', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postUpdate($id)
    {
        $milestone = Milestone::findOrFail($id);

        if ($milestone->save(Input::all()))
            return Redirect::action('MilestoneController@getIndex', ['project_id' => Input::get('project_id')])
                ->withMessage(trans('milestone.update_success'))->withType('success');

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
        $milestone = Milestone::findOrFail($id);
        $milestone->delete();

        return Redirect::back()
            ->withMessage(trans('milestone.destroy_success'))->withType('success');
    }

}