<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It is a breeze. Simply tell Lumen the URIs it should respond to
  | and give it the Closure to call when that URI is requested.
  |
 */

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('/', 'App\Http\Controllers\ExampleController@index');

    $api->post('/todo', ['middleware' => 'validator.todo', 'uses' => 'App\Http\Controllers\TodoController@store']);
    $api->get('/todo', 'App\Http\Controllers\TodoController@index');
    $api->get('/todo/{id}', 'App\Http\Controllers\TodoController@show');    
    $api->delete('/todo/{id}', 'App\Http\Controllers\TodoController@destroy');
    $api->patch('/todo/{id}', ['middleware' => 'validator.todo', 'uses' => 'App\Http\Controllers\TodoController@update']);
});

