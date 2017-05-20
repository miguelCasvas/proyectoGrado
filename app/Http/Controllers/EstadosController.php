<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Models\Estados;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    //
    use CreateRegisterLog;
    private $modelEstados = Estados::class;
    private $userController;

    function __construct(){

        $this->modelEstados = new Estados();
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

        $this->modelEstados->nombre_estado    = $request->get('nombreEstado');
        $this->modelEstados->id_modulo    = $request->get('idModulo');
        $this->modelEstados->save();

        $response = response()->json(['status'=>  200,'success'=>'success','data'=>$this->modelEstados]);
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
        $data = $this->modelEstados->find($id);
        $response = response()->json([ 'data'=> $data ]);
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
    public function index()
    {
        $data = $this->modelEstados->all();
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
        $this->modelEstados = $this->modelEstados->find($id);

        if ($this->modelEstados == null){
            abort(400, trans('errors.901'));
        }
        else{
            $this->modelEstados->nombre_estado    = $request->get('nombreEstado');
            $this->modelEstados->id_modulo    = $request->get('idModulo');
            $this->modelEstados->save();
            $response = response()->json(['data'=>$this->modelEstados]);
        }

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
        $this->modelEstados = $this->modelEstados->find($id);

        if ($this->modelEstados == null){
            abort(400, trans('errors.901'));
        }else {
            $this->modelEstados->delete();
            $response = response()->json([  'data'=> ['id'=> $id ]]);
        }
        $this->CreateRegisterLog($response);
        return $response;
    }
}
