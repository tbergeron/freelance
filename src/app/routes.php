<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get( '', 			array('as' => 'admin_home', 		'uses' => 'HomeController@home'));
Route::get( 'login', 		array('as' => 'admin_login', 		'uses' => 'HomeController@getLogin'));
Route::post('login', 		array('as' => 'admin_login', 		'uses' => 'HomeController@postLogin'));
Route::get( 'logout',       array('as' => 'admin_logout', 	    'uses' => 'HomeController@logout'));
Route::get( 'dashboard', 	array('as' => 'dashboard', 	        'uses' => 'HomeController@dashboard'));

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