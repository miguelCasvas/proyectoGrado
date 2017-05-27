<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Http\Requests\CanalComunicacion\StoreRequest;
use App\Models\CanalComunicacion;
use Illuminate\Http\Request;


class CanalComunicacionController extends Controller
{
    //
    use CreateRegisterLog;
    private $modelCanalComunicacion = CanalComunicacion::class;
    private $conjuntoController;
    private $userController;


    function __construct(){

        $this->modelCanalComunicacion = new CanalComunicacion();
        $this->userController = new UserController();
        $this->conjuntoController = new ConjuntoController();
    }

    /**
     * Store a newly created resource in storage for model CanalComunicacion.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $response = null;

        $this->modelCanalComunicacion->indicativo    = $request->get('indicativo');
        $this->modelCanalComunicacion->canal    = $request->get('canal');
        $this->modelCanalComunicacion->id_conjunto    = $request->get('idConjunto');
        $this->modelCanalComunicacion->save();

        // $conjunto;
        //$this->modelCanalComunicacion->nombre_conjunto    = $conjunto;
        $response = response()->json(['data'=>$this->modelCanalComunicacion]);

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
        $data = $this->modelCanalComunicacion->find($id);
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
        $data = $this->modelCanalComunicacion->all();
        return response()->json([ "data"=> $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $this->modelCanalComunicacion = $this->modelCanalComunicacion->find($id);
//
        if ($this->modelCanalComunicacion == null ){
            abort(400, trans('errors.901'));
        }
        else{
            $this->modelCanalComunicacion->indicativo    = $request->get('indicativo');
            $this->modelCanalComunicacion->canal    = $request->get('canal');
            $this->modelCanalComunicacion->id_conjunto    = $request->get('idConjunto');
            $this->modelCanalComunicacion->save();
            $response = response()->json(['data'=>$this->modelCanalComunicacion]);
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
        $this->modelCanalComunicacion = $this->modelCanalComunicacion->find($id);

        if ($this->modelCanalComunicacion == null){
            abort(400, trans('errors.901'));
        }else {
            $this->modelCanalComunicacion->delete();
            $response = response()->json([  'data'=> ['id'=> $id ]]);
        }
        $this->CreateRegisterLog($response);
        return $response;
    }
}
