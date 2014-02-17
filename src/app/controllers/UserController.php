<?php

class UserController extends \BaseController {

    public function __construct()
    {
        parent::__construct();
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
        return View::make('dashboard');
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return Redirect::action('UserController@getDashboard');
        } else {
            return View::make('login');
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