<?php

class PageController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($project_id)
    {
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
        $page->delete();

        return Redirect::action('PageController@getIndex', ['project_id' => $project_id])
            ->withMessage(trans('page.destroy_success'))->withType('danger');
    }

}