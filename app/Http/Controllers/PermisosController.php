<?php

namespace App\Http\Controllers;

use App\Models\Permisos;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\CreateRegisterLog;


class PermisosController extends Controller
{
    //
    use CreateRegisterLog;
    private $modelPermisos = Permisos::class;
    private $userController;

    function __construct(){

        $this->modelPermisos = new Permisos();
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
        $this->modelPermisos->nombre_permiso     = $request->get('nombrePermiso');
        $this->modelPermisos->id_roles           = $request->get('idRoles');
        $this->modelPermisos->id_estado          = $request->get('idEstado');
        $this->modelPermisos->id_role            = $request->get('idRole');
        $this->modelPermisos->save();

        $response = response()->json($this->modelPermisos);
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
        $data = $this->modelPermisos->find($id);
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
        $data = $this->modelPermisos->all();
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
        $this->modelPermisos = $this->modelPermisos->find($id);

        if ($this->modelPermisos == null){
            $numError = 400;
            $response = response()->json([ 'status'=>  $numError, 'message'=> trans('errors.'.$numError ) ], $numError);
        }
        else{
            $this->modelPermisos->nombre_permiso    = $request->get('nombrePermiso');
            $this->modelPermisos->id_roles          = $request->get('idRoles');
            $this->modelPermisos->id_estado         = $request->get('idEstado');
            $this->modelPermisos->id_role           = $request->get('idRole');
            $this->modelPermisos->save();

            $response = response()->json($this->modelPermisos);
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
        $this->modelPermisos = $this->modelPermisos->find($id);

        if ($this->modelPermisos == null){
            $numError = 400;
            $response = response()->json([ 'status'=>  $numError, 'success'=>'error', 'message'=> trans('errors.'.$numError ) ], $numError);
        }else {
            $this->modelPermisos->find($id)->delete();
            $numError = 200;
            $response = response()->json([ 'status'=>  $numError, 'success'=>'success',  'data'=> ['id'=> $id ]], $numError);
        }
        $this->CreateRegisterLog($response);
        return $response;
    }

}
