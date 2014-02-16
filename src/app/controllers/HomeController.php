<?php

class HomeController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth', array('only' => array('dashboard')));
    }

    public function home()
    {
        if (Auth::check()) {
            return Redirect::route('dashboard');
        } else {
            return Redirect::route('admin_login');
        }
    }

    public function dashboard()
    {
        return View::make('home.dashboard');
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return Redirect::route('dashboard');
        } else {
            return View::make('login');
        }
    }

    public function postLogin()
    {
        if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')), true)) {
            return Redirect::route('dashboard')
                ->withMessage(trans('app.logged_in'))
                ->withType('info');
        } else {
            return Redirect::route('admin_login')
                ->withMessage(trans('app.incorrect_username_or_password'))
                ->withType('danger')
                ->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('admin_login')
            ->withMessage(trans('app.logged_out'))
            ->withType('info');
    }

}