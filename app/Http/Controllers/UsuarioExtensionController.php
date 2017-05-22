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

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = ['data' => $this->modelUsuarioExtensiones->find($id)];
        return response()->json($data);

    }

    /**
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $this->modelUsuarioExtensiones->id_extension = $request->get('idExtension');
        $this->modelUsuarioExtensiones->id_usuario = $request->get('idUsuario');
        $this->modelUsuarioExtensiones->save();

        $response = response()->json($this->modelUsuarioExtensiones);

        # Creacion en modelo log
        $this->CreateRegisterLog($response);

        return $response;
    }

    /**
     * @param StoreRequest $request
     * @return StoreRequest
     */
    public function update(StoreRequest $request)
    {
        $this->modelUsuarioExtensiones = $this->modelUsuarioExtensiones->find($id);

        if ($this->modelUsuarioExtensiones == null){
            abort(400, trans('errors.901'));
        }

        $this->modelUsuarioExtensiones->id_extension = $request->get('idExtension');
        $this->modelUsuarioExtensiones->id_usuario = $request->get('idUsuario');
        $this->modelUsuarioExtensiones->save();

        $response = response()->json($this->modelUsuarioExtensiones);

        # Creacion en modelo log
        $this->CreateRegisterLog($response);
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->modelUsuarioExtensiones = $this->modelUsuarioExtensiones->find($id);

        if ($this->modelUsuarioExtensiones == null){
            abort(400, trans('errors.901'));
        }

        $this->modelUsuarioExtensiones->delete();

        $response = response()->json([  'data'=> ['id'=> $id ]]);

        $this->CreateRegisterLog($response);
        return $response;
    }
}
