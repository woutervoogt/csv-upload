<?php

use App\Core\Middleware\IsLoggedIn;

// General routes
$router->get('', 'PagesController@home');
$router->get('dashboard', 'PagesController@dashboard', [IsLoggedIn::class]);

// File routes
$router->get('dashboard/files/upload', 'FilesController@create', [IsLoggedIn::class]);
$router->post('dashboard/files/upload', 'FilesController@store', [IsLoggedIn::class]);
$router->get('dashboard/files/download', 'FilesController@download', [IsLoggedIn::class]);
$router->get('dashboard/files/show', 'FilesController@show', [IsLoggedIn::class]);
$router->get('dashboard/files/delete', 'FilesController@destroy', [IsLoggedIn::class]);
$router->post('dashboard/files/rows/edit', 'WorkhoursController@update', [IsLoggedIn::class]);
$router->get('dashboard/files/rows/delete', 'WorkhoursController@destroy', [IsLoggedIn::class]);

// Account routes
$router->get('login', 'LoginController@index');
$router->post('login', 'LoginController@login');
$router->get('logout', 'LoginController@logout');
$router->get('register', 'RegisterController@index');
$router->post('register', 'RegisterController@store');
