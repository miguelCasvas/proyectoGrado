<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Models\UsuarioExt;
use Illuminate\Http\Request;

class UsuarioExtensionController extends Controller
{
    //
    use CreateRegisterLog;
    private $modelUsuarioExtensiones = UsuarioExt::class;
    private $userController;

    function __construct(){

        $this->modelUsuarioExtensiones = new UsuarioExt();
        $this->userController = new UserController();
    }
}
