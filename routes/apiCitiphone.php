<?php

//Route::get('api', ['before' => 'oauth', function() {
//    // return the protected resource
//    //echo “success authentication”;
//    $user_id=Authorizer::getResourceOwnerId(); // the token user_id
//    $user=\App\User::find($user_id);// get the user data from database
//
//    return Response::json($user);
//}]);

Route::group(['prefix'=>'','before' => 'permisosUsuario'], function()
{
    //Route::post('usuarios', 'usuarioController@store');
    //Route::get('demo', 'usuarioController@demo');

    # USUARIO
    Route::resource('usuarios', 'usuarioController');

    # EXTENSION DE USUARIO
    Route::resource('usuarioextension', 'UsuarioExtensionController');

    # UBICACION DE CATALOGO
    Route::resource('ubicacioncatalogo', 'UbicacionCatalogoController');

    # TIPO SALIDA
    Route::resource('tiposalida','TipoSalidaController');

    # NOTIFICACIONES
    Route::resource('notificacion','NotificacionController');

    # LOGIN
    //Route::resource('login', 'LoginController');
    //Route::post('contrasenia', 'UserController@contrasenia');

    # CONJUNTO
    Route::resource('conjunto', 'ConjuntoController');

    # CATALOGO
    //Route::resource('catalogo', 'CatalogoController');

    # PERMISOS
    Route::resource('permisos', 'PermisoController');

    # ROL
    Route::resource('roles', 'RolController');

    # TIPOS SALIDAS
    //Route::resource('tipossalidas', 'TipoSalidaController');

    // ESTADOS
    Route::resource('estado', 'EstadoController');

    // CANAL DE COMUNICACION
    Route::resource('canalcomunicacion', 'CanalComunicacionController');

    // CATALOGO
    Route::resource('catalogo', 'CatalogoController');

    // CIUDAD
    Route::resource('ciudad', 'CiudadController');

    // HISTORIAL
    Route::resource('historial', 'HistorialController');

    // MODULO
    Route::resource('modulo', 'ModuloController');

    // LOG
    Route::resource('log', 'LogController');

});