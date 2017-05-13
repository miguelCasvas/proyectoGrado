<?php

//Route::get('api', ['before' => 'oauth', function() {
//    // return the protected resource
//    //echo “success authentication”;
//    $user_id=Authorizer::getResourceOwnerId(); // the token user_id
//    $user=\App\User::find($user_id);// get the user data from database
//
//    return Response::json($user);
//}]);

Route::group(['prefix'=>'','before' => 'oauth'], function()
{
    //Route::post('usuarios', 'usuarioController@store');
    //Route::get('demo', 'usuarioController@demo');

    // USUARIO
    Route::resource('usuarios', 'usuarioController');

    // LOGIN
    Route::resource('login', 'LoginController');
    Route::post('contrasenia', 'UserController@contrasenia');

});