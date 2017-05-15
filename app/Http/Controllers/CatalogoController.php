<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Models\Catalogo;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    use CreateRegisterLog;

    /**
     * @var Catalogo|string
     */
    private $modelCatalogo = Catalogo::class;

    private $conjuntoController = null;

    function __construct()
    {
        $this->modelCatalogo = new Catalogo();
        //$this->conjuntoController = new ConjutoController();
    }

    /**
     * Creacion de registro Catalogo
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->busquedaConjunto();

        $this->modelCatalogo->nombre_Catalogo = $request->get('nombreCatalogo');
        $this->modelCatalogo->id_conjunto = $request->get('idConjunto');
        $this->modelCatalogo->save();

        $response = response()->json($this->modelCatalogo);
        $this->CreateRegisterLog($response);
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogo $catalogo)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->busquedaConjunto();
        $this->modelCatalogo = $this->modelCatalogo->find($id);

        if ($this->modelCatalogo == null){
            $numError = 400;
            $response = response()->json([ 'status'=>  $numError, 'message'=> trans('errors.'.$numError ) ], $numError);
        }

        $this->modelCatalogo->nombre_Catalogo = $request->get('nombreCatalogo');
        $this->modelCatalogo->id_conjunto   = $request->get('idConjunto');
        $this->modelCatalogo->ave();

        $response = response()->json($this->modelCatalogo);
        $this->CreateRegisterLog($response);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalogo $catalogo)
    {
        //
    }

    /**
     * Validar que el registro exista en el modelo Conjunto
     *
     * @return bool | \App\Models\Conjunto
     */
    private function busquedaConjunto()
    {
        # Validar que exista conjunto por su id
        #if($this->conjuntoController->busquedaPorIdentificador($request->get('idConjunto')) == null){
        #    $numError = 400;
        #    $response = response()->json([ 'status'=>  $numError, 'message'=> trans('errors.'.$numError ) ], $numError);
        #}

    }
}
