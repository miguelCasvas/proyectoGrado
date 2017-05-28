<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Http\Requests\Usuario\StoreRequest;
use App\Http\Requests\Usuario\UpdateRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class usuarioController extends Controller
{

    use CreateRegisterLog;

    /**
     * @var Usuario
     */
    private $modelUsuario = Usuario::class;

    /**
     * @var UserController
     */
    private $userController;

    function __construct(){

        $this->modelUsuario = new Usuario();
        $this->userController = new UserController();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        # Validar permisos
        $this->validarPermisos($this->modelUsuario->getTable(), 1);

        $this->modelUsuario->nombres            = $request->get('nombres');
        $this->modelUsuario->apellidos          = $request->get('apellidos');
        $this->modelUsuario->identificacion     = $request->get('identificacion');
        $this->modelUsuario->fecha_nacimiento   = $request->get('fechaNacimiento');
        $this->modelUsuario->email              = $request->get('correo');
        $this->modelUsuario->id_rol             = $request->get('idRol');
        $this->modelUsuario->id_conjunto        = $request->get('idConjunto');
        $this->modelUsuario->save();

        # Creacion en modelo de user
        $this->userController->store($request, $this->modelUsuario->id_usuario);
        $response = response()->json($this->modelUsuario);

        # Creacion en modelo log
        $this->CreateRegisterLog($response);

        return $response;
    }

    /**
     * Busqueda de usuario por id
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        # Validar permisos
        $this->validarPermisos($this->modelUsuario->getTable(), 2);

        $data = ['data' => $this->modelUsuario->find($id)];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        # Validar permisos
        $this->validarPermisos($this->modelUsuario->getTable(), 3);

        $response = null;
        $this->modelUsuario = $this->modelUsuario->find($id);

        if ($this->modelUsuario == null)
            abort(400, trans('errors.901'));

        $this->modelUsuario->nombres            = $request->get('nombres');
        $this->modelUsuario->apellidos          = $request->get('apellidos');
        $this->modelUsuario->email              = $request->get('correo');
        $this->modelUsuario->identificacion     = $request->get('identificacion');
        $this->modelUsuario->fecha_nacimiento   = $request->get('fechaNacimiento');
        $this->modelUsuario->save();

        $response = response()->json($this->modelUsuario);
        $this->CreateRegisterLog($response);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # Validar permisos
        $this->validarPermisos($this->modelUsuario->getTable(), 4);

        $this->modelUsuario = $this->modelUsuario->find($id);

        if ($this->modelUsuario == null){
            abort(400, trans('errors.901'));
        }

        $this->userController->eliminacionPorIdUsuario($id);
        $this->modelUsuario->delete();

        $response = response()->json([  'data'=> ['id'=> $id ]]);

        $this->CreateRegisterLog($response);
        return $response;
    }

}
