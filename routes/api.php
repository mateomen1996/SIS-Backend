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
        Route::post('logout', 'AuthController@logout');
        Route::post('user', 'AuthController@user');
    });
}); 

//CON AUTENTIFICACION
Route::group(['middleware' => 'auth:api'], function () {
    //USER
    Route::post('userCreator', 'userController@userCreator');
    Route::post('user/{id}', 'userController@getUser');
    Route::put('user/{id}', 'userController@update');

    //Cirugia
    Route::post('cirugia', 'cirugiaController@crear');
    Route::post('cirugia/getCirugias', 'cirugiaController@getCirugias');
    Route::post('cirugia/{id}', 'cirugiaController@getCirugia');
    Route::put('cirugia/{id}', 'cirugiaController@update');

    //Salas
    Route::post('sala', 'salaController@crear');
    Route::post('salas', 'salaController@getSalas');
    Route::post('sala/{id}', 'salaController@getSala');
    Route::put('sala/{id}', 'salaController@update');
    //Salas
    Route::post('sala', 'salaController@crear');
    Route::post('salas', 'salaController@getSalas');
    Route::post('sala/{id}', 'salaController@getSala');
    Route::put('sala/{id}', 'salaController@update');
    //Rol - Personal
    Route::post('rolPersonal/mostrar', 'rolPersonalController@mostrar');
    //Personal
    Route::post('personal/crear', 'personalController@crear');
    Route::post('personal/mostrar', 'personalController@mostrar');
    Route::post('personal/detalle/{id}', 'personalController@detalle');
    Route::put('personal/actualizar/{id}', 'personalController@actualizar');
    //PersonalCirugia
    Route::post('personalCirugia/crear', 'personalCirugiaController@crear');
    Route::post('personalCirugia/mostrar', 'personalCirugiaController@mostrar');
    Route::post('personalCirugia/detalle/{id}', 'personalCirugiaController@detalle');
    Route::put('personalCirugia/actualizar/{id}', 'personalCirugiaController@actualizar');
});
//SIN AUTENTIFICACION
//Rol
Route::get('rol', 'rolController@rol');
