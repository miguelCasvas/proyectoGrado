<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Models\TiposSalidas;
use Illuminate\Http\Request;

class TipoSalidaController extends Controller
{
    //
    use CreateRegisterLog;
    private $modelTiposSalidas = TiposSalidas::class;
    private $userController;

    function __construct(){

        $this->modelTiposSalidas = new TiposSalidas();
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

        $this->modelTiposSalidas->nombre_tipo_salida    = $request->get('nombreTipoSalida');
        $this->modelTiposSalidas->id_marcado    = $request->get('idMarcado');
        $this->modelTiposSalidas->id_notificacion    = $request->get('idNotificacion');
        $this->modelTiposSalidas->save();

        $response = response()->json($this->modelTiposSalidas);
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
        $data = $this->modelTiposSalidas->find($id);
        $numError = 200;

        $response = response()->json([ 'status'=>  $numError, 'message'=> trans('errors.'.$numError ), "data"=> $data ], $numError);
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
        $data = $this->modelTiposSalidas->all();
        $numError = 200;

        return response()->json([ 'status'=>  $numError, 'message'=> trans('errors.'.$numError ), "data"=> $data ], $numError);
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
        $this->modelTiposSalidas = $this->modelTiposSalidas->find($id);

        if ($this->modelTiposSalidas == null){
            $numError = 400;
            $response = response()->json([ 'status'=>  $numError, 'message'=> trans('errors.'.$numError ) ], $numError);
        }
        else{
            $this->modelTiposSalidas->nombre_tipo_salida    = $request->get('nombreTipoSalida');
            $this->modelTiposSalidas->id_marcado    = $request->get('idMarcado');
            $this->modelTiposSalidas->id_notificacion    = $request->get('idNotificacion');
            $this->modelTiposSalidas->save();

            $response = response()->json($this->modelTiposSalidas);
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
        $this->modelTiposSalidas = $this->modelTiposSalidas->find($id);

        if ($this->modelTiposSalidas == null){
            $numError = 400;
            $response = response()->json([ 'status'=>  $numError, 'success'=>'error', 'message'=> trans('errors.'.$numError ) ], $numError);
        }else {
            $this->modelTiposSalidas->find($id)->delete();
            $numError = 200;
            $response = response()->json([ 'status'=>  $numError, 'success'=>'success',  'data'=> ['id'=> $id ]], $numError);
        }
        $this->CreateRegisterLog($response);
        return $response;
    }
}
