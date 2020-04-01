<?php

//Auth
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('signup', 'AuthController@signup');
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
}); 

//CON AUTENTIFICACION
Route::group(['middleware' => 'auth:api'], function () {
Route::get('userCreator', 'userController@userCreator');

    
});

//SIN AUTENTIFICACION
//User
Route::get('user', 'userController@user');
//Rol
Route::get('rol', 'rolController@rol');