<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    //
    use CreateRegisterLog;
    private $modelCiudad = Ciudad::class;
    private $userController;

    function __construct(){

        $this->modelCiudad = new Ciudad();
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

        $this->modelCiudad->nombre_estado    = $request->get('nombreEstado');
        $this->modelCiudad->canal    = $request->get('canal');
        $this->modelCiudad->id_modulo    = $request->get('idModulo');
        $this->modelCiudad->save();

        $response = response()->json(['data'=>$this->modelCiudad]);
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
        $data = $this->modelCiudad->find($id);
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
        $data = $this->modelCiudad->all();
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
        $this->modelCiudad = $this->modelCiudad->find($id);

        if ($this->modelCiudad == null){
            abort(400, trans('errors.901'));
        }
        else{
            $this->modelCiudad->nombre_estado    = $request->get('nombreEstado');
            $this->modelCiudad->id_modulo    = $request->get('idModulo');
            $this->modelCiudad->save();
            $response = response()->json(['data'=>$this->modelCiudad]);
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
        $this->modelCiudad = $this->modelCiudad->find($id);

        if ($this->modelCiudad == null){
            abort(400, trans('errors.901'));
        }else {
            $this->modelCiudad->delete();
            $response = response()->json([  'data'=> ['id'=> $id ]]);
        }
        //$this->CreateRegisterLog($response);
        return $response;
    }
}