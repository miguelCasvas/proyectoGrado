<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Http\Requests\UsuarioExtension\StoreRequest;
use App\Models\UsuarioExt;
use Illuminate\Http\Request;

class UsuarioExtensionController extends Controller
{

    use CreateRegisterLog;
    private $modelUsuarioExtensiones = UsuarioExt::class;
    private $userController;

    function __construct(){

        $this->modelUsuarioExtensiones = new UsuarioExt();
        $this->userController = new UserController();
    }

    public function index()
    {
        
    }
    
    public function store(StoreRequest $request)
    {
        $this->modelUsuarioExtensiones->id_extension = $request->get('idExtension');
        $this->modelUsuarioExtensiones->id_usuario = $request->get('idUsuario');
        $this->modelUsuarioExtensiones->save();
    }
}
