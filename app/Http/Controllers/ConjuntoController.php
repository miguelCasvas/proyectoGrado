<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Models\Conjunto;
use Illuminate\Http\Request;

class ConjuntoController extends Controller
{
    use CreateRegisterLog;
    /**
     * @var Usuario
     */
    private $modelConjunto = Conjunto::class;

    //private $conjuntoController;
    function __construct()
    {
        $this->modelConjunto = new Conjunto();
    }

    /**
     * Store a newly created resource in storage. craete conjunto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->modelConjunto->nombre_conjunto     = $request->get('nombreConjunto');
        $this->modelConjunto->direccion     = $request->get('direccion');
        $this->modelConjunto->email     = $request->get('correo');
        $this->modelConjunto->telefono     = $request->get('telefono');
        $this->modelConjunto->complemento     = $request->get('complemento');
        $this->modelConjunto->imagen     = $request->get('imagen');
        $this->modelConjunto->id_ciudad     = $request->get('id_ciudad');
        $this->modelConjunto->save();
        $response = response()->json($this->modelConjunto);
        # Creacion en modelo log
        $this->CreateRegisterLog($response);
        return $response;
    }

    /**
     * Display the specified resource. get conjunto
     *
     * @param  \App\Models\Conjunto  $conjunto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = $this->modelConjunto->find($id);
        $response = response()->json([ 'data'=> $data ]);
        # Creacion en modelo log
        //$this->CreateRegisterLog($response);
        return $response;
    }



    /**
     * Update the specified resource in storage. put conjunto
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conjunto  $conjunto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $response = null;
        $this->modelConjunto = $this->modelConjunto->find($id);
//
        if ($this->modelConjunto == null ){
            abort(400, trans('errors.901'));
        }
        else{
            $this->modelConjunto->indicativo    = $request->get('indicativo');
            $this->modelConjunto->canal    = $request->get('canal');
            $this->modelConjunto->id_conjunto    = $request->get('idConjunto');
            $this->modelConjunto->save();
            $response = response()->json(['data'=>$this->modelConjunto]);
        }

        //$this->CreateRegisterLog($response);
        return $response;
    }

    /**
     * Remove the specified resource from storage. delete conjunto
     *
     * @param  \App\Models\Conjunto  $conjunto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = null;
        $this->modelConjunto = $this->modelConjunto->find($id);

        if ($this->modelConjunto == null){
            abort(400, trans('errors.901'));
        }else {
            $this->modelConjunto->delete();
            $response = response()->json([  'data'=> ['id'=> $id ]]);
        }
        //$this->CreateRegisterLog($response);
        return $response;
    }

    /**
     * Validate if exist conjunto
     * @param $id
     * @return string with conjunto name
     */
    public function nombreConjunto($id)
    {
        $data = $this->modelConjunto->find($id);
        if($data == null){
            $response = "";
        }else{
            $response = $data["attributes"]["nombre_conjunto"];
        }
        return $response;
    }
}
