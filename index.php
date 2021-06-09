<?php
require 'core/bootstrap.php';

$routes = [
    '/tasklist' => 'TaskController@tasklist',
    '/tasklist/delete' => 'TaskController@delete',
    '/tasklist/edit' => 'TaskController@edit',
    '/tasklist/new' => 'TaskController@new',
    '/tasklist/update' => 'TaskController@update',
];

$db = [
    'name'     => 'tasklist',
    'username' => 'root',
    'password' => '',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');
