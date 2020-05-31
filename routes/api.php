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

    //ROL
    Route::post('rol/mostrar', 'rolController@mostrar');

    //USER
    Route::post('user/encargado', 'userController@encargado');
    Route::post('user/paciente', 'userController@paciente');
    Route::post('user/doctor', 'userController@doctor');
    Route::post('userCreator', 'userController@userCreator');
    Route::post('user/{id}', 'userController@getUser');
    Route::put('user/{id}', 'userController@update');
    Route::put('user/resetpass/{id}', 'userController@resetpass');

    //Cirugia
    Route::post('cirugia', 'cirugiaController@crear');
    Route::post('cirugia/getCirugias', 'cirugiaController@getCirugias');
    Route::post('cirugia/{id}', 'cirugiaController@getCirugia');
    Route::put('cirugia/{id}', 'cirugiaController@update');
    Route::put('cirugia/encargado', 'cirugiaController@encargado');
    Route::put('cirugia/cambiarProceso/{id}', 'cirugiaController@cambiarProceso');

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
    Route::post('personal/eliminar/{id}', 'personalController@eliminar');
    //PersonalCirugia
    Route::post('personalCirugia/crear', 'personalCirugiaController@crear');
    Route::post('personalCirugia/mostrar', 'personalCirugiaController@mostrar');
    Route::post('personalCirugia/detalle/{id}', 'personalCirugiaController@detalle');
    Route::put('personalCirugia/actualizar/{id}', 'personalCirugiaController@actualizar');
    Route::post('personalCirugia/eliminar/{id}', 'personalCirugiaController@eliminar');
    Route::post('personalCirugia/personalDeUnaCirugia/{id}', 'personalCirugiaController@personalDeUnaCirugia');
    
    //Material
    Route::post('material/crear', 'materialController@crear');
    Route::post('material/mostrar', 'materialController@mostrar');
    Route::post('material/detalle/{id}', 'materialController@detalle');
    Route::put('material/actualizar/{id}', 'materialController@actualizar');
    Route::post('material/eliminar/{id}', 'materialController@eliminar');
    //MaterialCirugia
    Route::post('materialCirugia/crear', 'materialCirugiaController@crear');
    Route::post('materialCirugia/mostrar', 'materialCirugiaController@mostrar');
    Route::post('materialCirugia/detalle/{id}', 'materialCirugiaController@detalle');
    Route::put('materialCirugia/actualizar/{id}', 'materialCirugiaController@actualizar');
    Route::post('materialCirugia/materialEnCirugia/{id}', 'materialCirugiaController@materialEnCirugia');
    Route::post('materialCirugia/eliminar/{id}', 'materialCirugiaController@eliminar');

    //Insumos
    Route::post('insumo/crear', 'insumoController@crear');
    Route::post('insumo/mostrar', 'insumoController@mostrar');
    Route::post('insumo/detalle/{id}', 'insumoController@detalle');
    Route::put('insumo/actualizar/{id}', 'insumoController@actualizar');
    Route::post('insumo/eliminar/{id}', 'insumoController@eliminar');
    
    //InsumosCirugia
    Route::post('insumoCirugia/crear', 'insumoCirugiaController@crear');
    Route::post('insumoCirugia/mostrar', 'insumoCirugiaController@mostrar');
    Route::post('insumoCirugia/detalle/{id}', 'insumoCirugiaController@detalle');
    Route::put('insumoCirugia/actualizar/{id}', 'insumoCirugiaController@actualizar');
    Route::post('insumoCirugia/insumoEnCirugia/{id}', 'insumoCirugiaController@insumoEnCirugia');
    Route::post('insumoCirugia/eliminar/{id}', 'insumoCirugiaController@eliminar');
    //Estado
    Route::post('estado/mostrar', 'estadoController@mostrar');
    //Vistas
    Route::post('vistas/cirugias', 'vistasController@cirugias');
    Route::post('vistas/materiales', 'vistasController@materiales');
    Route::post('vistas/cirugias', 'vistasController@encargado');
    Route::post('vistas/cirugiasEspera', 'vistasController@cirugiasEspera');
    Route::post('vistas/personal', 'vistasController@personal');


    //Proceso
    Route::post('proceso/crear', 'procesoController@crear');
    Route::post('proceso/mostrar', 'procesoController@mostrar');
    Route::post('proceso/detalle/{id}', 'procesoController@detalle');
    Route::put('proceso/actualizar/{id}', 'procesoController@actualizar');

});
//SIN AUTENTIFICACION
//Rol
Route::get('routes', function() {
    $routeCollection = Route::getRoutes();
    
    echo "<table style='width:100%'>";
        echo "<tr>";
            echo "<td width='10%'><h4>HTTP Method</h4></td>";
            echo "<td width='10%'><h4>Route</h4></td>";
            echo "<td width='10%'><h4>Name</h4></td>";
            echo "<td width='70%'><h4>Corresponding Action</h4></td>";
        echo "</tr>";
        foreach ($routeCollection as $value) {
            echo "<tr>";
                echo "<td>" . $value->methods()[0] . "</td>";
                echo "<td>" . $value->uri() . "</td>";
                echo "<td>" . $value->getName() . "</td>";
                echo "<td>" . $value->getActionName() . "</td>";
            echo "</tr>";
        }
    echo "</table>";
    });