<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioExtensionesController extends Controller
{
    //
    use CreateRegisterLog;
    private $modelUsuarioExtensiones = UsuarioExtensiones::class;
    private $userController;

    function __construct(){

        $this->modelUsuarioExtensiones = new UsuarioExtensiones();
        $this->userController = new UserController();
    }
}
