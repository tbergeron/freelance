<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::controller('page',       'PageController');
Route::controller('milestone',  'MilestoneController');
Route::controller('comment',    'CommentController');
Route::controller('task',       'TaskController');
Route::controller('project',    'ProjectController');
Route::controller('user',       'UserController');

// TODO: Super-awesome route like /PROJ-001 to lead to a specific task

Route::get('', 'HomeController@getDashboard');

// Navigation Active
HTML::macro('menu_active', function ($action, $text, $ignore_match = false) {
    $active = '';

    if (!$ignore_match) {
        $target_controller = substr($action, 0, strrpos($action, '@'));
        $current_controller = substr(Route::currentRouteAction(), 0, strrpos(Route::currentRouteAction(), '@'));

        if ($target_controller == $current_controller) {
            $active = "class = 'active'";
        }
    }

    return '<li ' . $active . '>' . link_to_action($action, $text) . '</li>';
});