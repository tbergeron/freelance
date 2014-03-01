<?php

class UserController extends \BaseController {

    public function __construct()
    {
        parent::__construct(true);
        $this->beforeFilter('auth', ['except' => ['getLogin', 'postLogin']]);
    }

    /*
     * Login/Logout
     */

    public function getLogin()
    {
        if (Auth::check()) {
            return Redirect::action('HomeController@getDashboard');
        } else {
            return View::make('user.login');
        }
    }

    public function postLogin()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), true)) {
            return Redirect::action('HomeController@getDashboard')
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

    /*
     * Management
     */

    public function getIndex()
    {
        if (!Auth::user()->is_admin)
            return Permission::kickOut();

        $users = User::all();
        return View::make('user.index', compact('users'));
    }

    public function getShow($id)
    {
        // TODO: User profiles
        $user = User::findOrFail($id);
        return View::make('user.show', compact('user'));
    }

    public function getCreate()
    {
        if (!Auth::user()->is_admin)
            return Permission::kickOut();

        $projects = Project::all();
        return View::make('user.create', compact('projects'));
    }

    public function postStore()
    {
        if (!Auth::user()->is_admin)
            return Permission::kickOut();

        $user = new User;

        if ($user->save(Input::except('permissions'))) {
            $this->applyPermissions($user->id, Input::get('permissions'));

            return Redirect::action('UserController@getIndex')
                ->withMessage(trans('user.create_success'))->withType('success');
        } else
            return Redirect::back()->withInput()->withErrors($user->getErrors());
    }

    public function getEdit($id)
    {
        if (!Auth::user()->is_admin)
            return Permission::kickOut();

        $user = User::findOrFail($id);
        $projects = Project::all();
        $permissions = $user->permissions;
        $edit = true;
        return View::make('user.edit', compact('user', 'edit', 'projects', 'permissions'));
    }

    public function postUpdate($id)
    {
        if (!Auth::user()->is_admin)
            return Permission::kickOut();

        $user = User::findOrFail($id);

        if (strlen(Input::get('password')) == 0) {
            // If there's no password specified, ignore the field.
            $data = Input::except(['email', 'password', 'permissions']);
        } else {
            $data = Input::except('email', 'permissions');
        }

        // checkboxes don't return anything
        $data['is_admin'] = Input::has('is_admin');

        if ($user->save($data)) {
            $this->applyPermissions($id, Input::get('permissions'));

            return Redirect::action('UserController@getIndex')
                ->withMessage(trans('user.update_success'))->withType('success');
        } else
            return Redirect::back()->withInput()->withErrors($user->getErrors());
    }

    public function getDestroy($id)
    {
        if (!Auth::user()->is_admin)
            return Permission::kickOut();

        $user = User::findOrFail($id);
        $user->delete();

        return Redirect::action('UserController@getIndex')
            ->withMessage(trans('user.destroy_success'))->withType('danger');
    }

    private function applyPermissions($id, $permissions)
    {
        // wiping users permissions
        Permission::where('user_id', $id)->delete();

        // inserting updated permissions
        foreach($permissions as $project_id => $modes) {
            $p = new Permission;
            $p->user_id = $id;
            $p->project_id = $project_id;

            if (isset($modes['read'])) {
                $p->read = true;
            }

            if (isset($modes['write'])) {
                $p->write = true;
            }

            $p->save();
        }
    }

}