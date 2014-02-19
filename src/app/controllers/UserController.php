<?php

class UserController extends \BaseController {

    public function __construct()
    {
        parent::__construct(true);
        $this->beforeFilter('auth', array('only' => array('getDashboard')));
    }

    public function getHome()
    {
        if (Auth::check()) {
            return Redirect::action('UserController@getDashboard');
        } else {
            return Redirect::route('UserController@getLogin');
        }
    }

    public function getDashboard()
    {
        $tasks = Task::orderBy('updated_at', false)->get();
        return View::make('user.dashboard', compact('tasks'));
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return Redirect::action('UserController@getDashboard');
        } else {
            return View::make('user.login');
        }
    }

    public function postLogin()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), true)) {
            return Redirect::action('UserController@getDashboard')
                ->withMessage(trans('app.logged_in'))
                ->withType('info');

        } else {
            return Redirect::action('UserController@getLogin')
                ->withMessage(trans('app.incorrect_username_or_password'))
                ->withType('danger')
                ->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::action('UserController@getLogin')
            ->withMessage(trans('app.logged_out'))
            ->withType('info');
    }

}