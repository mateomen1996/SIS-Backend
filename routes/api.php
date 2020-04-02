<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
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
Route::post('userCreator', 'userController@userCreator');
Route::get('user/{id}', 'userController@getUser');
Route::put('user/{id}', 'userController@update');


});

//SIN AUTENTIFICACION
//User
Route::get('user', 'userController@user');
//Rol
Route::get('rol', 'rolController@rol');