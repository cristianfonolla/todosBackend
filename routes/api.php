<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {

    Route::resource('task' , 'TasksController::class');

    Route::resource('user' , 'UsersController:class');

    Route::resource('user.task' , 'UserTaskController::class');


});