<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return 'Testing a Route';
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get("users", [ 'as' => 'users.index','uses' => "UserModelController@index" ]);

Route::get("medicamentos", [ 'as' => 'medicamento.index','uses' => "MedicamentoModelController@index" ]);

//Route::get("clientes", [ 'as' => 'clientes.index','uses' => "ClienteModelController@index" ]);

Route::resource('clientes', 'ClienteModelController' );