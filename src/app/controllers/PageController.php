<?php

class PageController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($project_id)
    {
        if (!Permission::check($project_id, true, false))
            return Permission::kickOut();

        $project = Project::findOrFail($project_id);
        $pages = $project->pages;

        return View::make('page.index', compact('pages', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate($project_id = null)
    {
        if (!Permission::check($project_id, true, true))
            return Permission::kickOut();

        $project = Project::findOrFail($project_id);
        return View::make('page.create', compact('project'));
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

        $page = new Page;

        if ($page->save(Input::all()))
            return Redirect::action('PageController@getShow', ['id' => $page->id])
                ->withMessage(trans('page.create_success'))->withType('success');

        else
            return Redirect::back()->withInput()->withErrors($page->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {
        $page = Page::findOrFail($id);
        $project = $page->project;
        
        if (!Permission::check($project->id, true, false))
            return Permission::kickOut();

        return View::make('page.show', compact('page', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $page = Page::findOrFail($id);
        $project = $page->project;
        
        if (!Permission::check($project->id, true, true))
            return Permission::kickOut();

        return View::make('page.edit', compact('page', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postUpdate($id)
    {
        $page = Page::findOrFail($id);

        if (!Permission::check($page->project->id, true, true))
            return Permission::kickOut();

        if ($page->save(Input::all()))
            return Redirect::action('PageController@getShow', ['id' => $page->id])
                ->withMessage(trans('page.update_success'))->withType('success');

        else
            return Redirect::back()->withInput()->withErrors($page->getErrors());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getDestroy($id)
    {
        $page = Page::findOrFail($id);
        $project_id = $page->project_id;
        
        if (!Permission::check($project_id, true, true))
            return Permission::kickOut();

        $page->delete();

        return Redirect::action('PageController@getIndex', ['project_id' => $project_id])
            ->withMessage(trans('page.destroy_success'))->withType('danger');
    }

}
