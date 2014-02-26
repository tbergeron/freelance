<?php

class PageController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($project_id = null)
    {
        if ($project_id) {
            $project = Project::find($project_id);
            $pages = $project->pages;
        } else
            $pages = Page::all();

        return View::make('page.index', compact('pages', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        return View::make('page.create');
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
            return Redirect::action('PageController@getIndex')
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
        return View::make('page.edit', compact('page'));
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
            return Redirect::action('PageController@getIndex')
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
        $page->delete();

        return Redirect::action('PageController@getIndex')
            ->withMessage(trans('page.destroy_success'))->withType('danger');
    }

}
