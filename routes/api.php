<?php

use Illuminate\Http\Request;


//HTTPIE comanda de prova per auth.basic

// http -a cat.seguretat@gmail.com:passdeprovahttp://localhost:8080/api/v1/task

Route::group(['prefix' => 'v1','middleware' => ['cors','auth:api']], function () {
    Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

        Route::resource('task', 'TasksController');

        Route::resource('user', 'UsersController');

        Route::resource('user.task', 'UserTaskController');

        Route::get('/user', function (Request $request) {
            return $request->user();
        });

    });

//,'middleware' => 'auth:api'
});