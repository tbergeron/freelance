<?php

class HomeController extends BaseController {

    public function __construct()
    {
        parent::__construct(true);
        $this->beforeFilter('auth', ['only' => ['getDashboard']]);
    }

    /*
     * Dashboard
     */

    public function getHome()
    {
        if (Auth::check()) {
            return Redirect::action('HomeController@getDashboard');
        } else {
            return Redirect::route('UserController@getLogin');
        }
    }

    public function getDashboard()
    {
        $tasks = Task::orderBy('updated_at', 'desc')->limit(Task::$items_per_page)->get();
        $starred_tasks = Auth::user()->starred_tasks()->get();
        $projects = Project::all();

        return View::make('user.dashboard', compact('tasks', 'starred_tasks', 'projects'));
    }

}
