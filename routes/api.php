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
    //Material
    Route::post('material/crear', 'materialController@crear');
    Route::post('material/mostrar', 'materialController@mostrar');
    Route::post('material/detalle/{id}', 'materialController@detalle');
    Route::put('material/actualizar/{id}', 'materialController@actualizar');
    //MaterialCirugia
    Route::post('materialCirugia/crear', 'materialCirugiaController@crear');
    Route::post('materialCirugia/mostrar', 'materialCirugiaController@mostrar');
    Route::post('materialCirugia/detalle/{id}', 'materialCirugiaController@detalle');
    Route::put('materialCirugia/actualizar/{id}', 'materialCirugiaController@actualizar');
    //Insumos
    Route::post('insumo/crear', 'insumoController@crear');
    Route::post('insumo/mostrar', 'insumoController@mostrar');
    Route::post('insumo/detalle/{id}', 'insumoController@detalle');
    Route::put('insumo/actualizar/{id}', 'insumoController@actualizar');
    //InsumosCirugia
    Route::post('insumoCirugia/crear', 'insumoCirugiaController@crear');
    Route::post('insumoCirugia/mostrar', 'insumoCirugiaController@mostrar');
    Route::post('insumoCirugia/detalle/{id}', 'insumoCirugiaController@detalle');
    Route::put('insumoCirugia/actualizar/{id}', 'insumoCirugiaController@actualizar');
    //Vistas
    Route::post('vistas/cirugias', 'vistasController@cirugias');
    Route::post('vistas/materiales', 'vistasController@materiales');

});
//SIN AUTENTIFICACION
//Rol
Route::get('rol', 'rolController@rol');
