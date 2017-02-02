<?php
use App\Task;
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'can:show,App\Task'], function () {
        Route::get('/tasks', function () {
            return view('tasks');
        });
    });
    Route::get('tasks1', function()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    });
    Route::get('/profile/tokens', function () {
        return view('tokens');
    });
    Route::get('/users', function () {
        dd(App\User::paginate());
    });
    Route::get('/float', function () {
        return view('float');
    });
    #adminlte_routes
    Route::get('FlexBoxlayout2', 'FlexBoxlayout2Controller@index')->name('FlexBoxlayout2');

    Route::get('FlexBoxlayout1', 'FlexBoxlayout1Controller@index')->name('FlexBoxlayout1');

    Route::get('boostraplayout', 'BoostraplayoutController@index')->name('boostraplayout');

    Route::get('flexboxlayout', 'FlexboxlayoutController@index')->name('flexboxlayout');

    
    Route::get('csstable', 'CsstableController@index')->name('csstable');

    Route::get('layaoutfloat', 'LayaoutfloatController@index')->name('layaoutfloat');

    Route::get('boxmodel', 'BoxmodelController@index')->name('boxmodel');

});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/phpinfo', function () {
    phpinfo();
});