<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::controller('task',       'TaskController');
Route::controller('project',    'ProjectController');
Route::controller('user',       'UserController');

// TODO: Super-awesome route like /PROJ-001 to lead to a specific task

Route::get('', 'UserController@getDashboard');

// Navigation Active
HTML::macro('menu_active', function ($route, $text) {
    $route_token = (strrpos($route, '.') != true) ? $route : substr($route, 0, strrpos($route, '.'));

    if (strpos(Request::path(), $route_token) !== FALSE) {
        $active = "class = 'active'";
    } else {
        $active = '';
    }
    return '<li ' . $active . '>' . link_to_route($route, $text) . '</li>';
});