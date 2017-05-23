<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',function(){$user = new App\User();
    $user->name="test user";
    $user->email="test@test.com";
    //$user->password = \Illuminate\Support\Facades\Hash::make("password");
    $user->password = "password";
    $user->is_estado_contrasenia = "1";
    $user->id_usuario = "1";
    $user->save();
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});
