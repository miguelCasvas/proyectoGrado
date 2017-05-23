<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    //
    use CreateRegisterLog;
    private $modelEstado = Estado::class;
    private $userController;

    function __construct(){

        $this->modelEstado = new Estado();
        $this->userController = new UserController();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->modelEstado->nombre_estado    = $request->get('nombreEstado');
        $this->modelEstado->canal    = $request->get('canal');
        $this->modelEstado->id_modulo    = $request->get('idModulo');
        $this->modelEstado->save();

        $response = response()->json(['data'=>$this->modelEstado]);
        # Creacion en modelo log
        $this->CreateRegisterLog($response);

        return $response;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->modelEstado->find($id);
        $response = response()->json([ 'data'=> $data ]);
        # Creacion en modelo log
        //$this->CreateRegisterLog($response);
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->modelEstado->all();
        return response()->json([ "data"=> $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = null;
        $this->modelEstados = $this->modelEstado->find($id);

        if ($this->modelEstado == null){
            abort(400, trans('errors.901'));
        }
        else{
            $this->modelEstado->nombre_estado    = $request->get('nombreEstado');
            $this->modelEstado->id_modulo    = $request->get('idModulo');
            $this->modelEstado->save();
            $response = response()->json(['data'=>$this->modelEstado]);
        }

        //$this->CreateRegisterLog($response);
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
        $response = null;
        $this->modelEstado = $this->modelEstado->find($id);

        if ($this->modelEstado == null){
            abort(400, trans('errors.901'));
        }else {
            $this->modelEstado->delete();
            $response = response()->json([  'data'=> ['id'=> $id ]]);
        }
        //$this->CreateRegisterLog($response);
        return $response;
    }
}
