<?php
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');
    Route::get('getUser', 'AuthController@getUser');
    Route::get('getRol', 'rolController@getRol');
  
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('signup', 'AuthController@signup');
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
}); 