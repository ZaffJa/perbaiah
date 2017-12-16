<?php

Route::get('/', function () {
    return redirect('/log-masuk');
});

Route::get('/log-masuk', 'LoginController@index');

Route::get('/ralat-akses', function(){
    return view('template.error');
});
Route::get('/log-keluar', function(){
    auth()->logout();
    return redirect('/log-masuk');
});
Route::post('/log-masuk', 'LoginController@authenticate');

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
    
    Route::prefix('chat')->group(function () {
        Route::get('/', 'ChatController@index');
        Route::get('with/{user}', 'ChatController@chat');
        Route::get('conversation/{id}', 'ChatController@getChats');
        Route::post('/create', 'ChatController@store');
    });
    
    Route::prefix('user')->group(function () {
        Route::get('/', 'UserController@index');
        Route::get('create', 'UserController@create');
        Route::post('create', 'UserController@store');
        Route::get('{user}/edit', 'UserController@edit');
        Route::post('{user}/edit', 'UserController@update');
        Route::get('{user}/delete', 'UserController@delete');
    
    });
    
    Route::prefix('blog')->group(function () {
        Route::get('/', 'BlogController@index');
        Route::get('create', 'BlogController@create');
        Route::post('create', 'BlogController@store');
        Route::get('{blog}/edit', 'BlogController@edit');
        Route::post('{blog}/edit', 'BlogController@update');
        Route::get('{blog}/delete', 'BlogController@destroy');
    });

    Route::prefix('album')->group(function () {
        Route::get('/', 'AlbumController@index');
    });
});

Route::group(['middleware' => 'role:user', 'prefix' => 'user'], function () {
    Route::get('/', 'UserController@indexUser');
    Route::get('about', function(){
        return view('user.about');
    });
    Route::get('blog', function(){
        return view('user.blog');
    });
    Route::get('organisation', function(){
        return view('user.organisation');
    });
    Route::get('album', function(){
        return view('user.album');
    });
    Route::get('profil', 'UserController@editUser');
    Route::get('chat', 'ChatController@chatUser');
    Route::post('profil', 'UserController@updateUser');
    Route::get('chat/with/admin', 'ChatController@chatWithAdmin');
    Route::post('chat/create', 'ChatController@store');
    Route::post('search', 'UserController@search');
    
});

Route::get('/blog/{blog}', 'BlogController@show');

