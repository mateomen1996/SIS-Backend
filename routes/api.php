<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
//Auth
Route::group(['prefix' => 'auth'], function () {
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');
    Route::post('login', 'AuthController@login');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('signup', 'AuthController@signup');
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
}); 

//CON AUTENTIFICACION
Route::group(['middleware' => 'auth:api'], function () {
    //USER
    Route::post('userCreator', 'userController@userCreator');
    Route::get('user/{id}', 'userController@getUser');
    Route::put('user/{id}', 'userController@update');

    //Cirugia
    Route::post('cirugia', 'cirugiaController@crear');
    
    //Salas
    Route::get('salas', 'salaController@salas');
});

//SIN AUTENTIFICACION
//Rol
Route::get('rol', 'rolController@rol');