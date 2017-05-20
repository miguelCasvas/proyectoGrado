<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    //
    use CreateRegisterLog;
    private $modelRol = Rol::class;
    private $userController;

    function __construct(){

        $this->modelRol = new Rol();
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

        $this->modelRol->nombre_role    = $request->get('nombreRole');
        $this->modelRol->save();

        $response = response()->json($this->modelRol);
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
        $data = $this->modelRol->find($id);
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
        $data = $this->modelRol->all();
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
        $this->modelRol = $this->modelRol->find($id);

        if ($this->modelRol == null){
            $numError = 400;
            $response = response()->json([ 'status'=>  $numError, 'message'=> trans('errors.'.$numError ) ], $numError);
        }
        else{
            $this->modelRol->nombre_role    = $request->get('nombreRole');
            $this->modelRol->save();

            $response = response()->json($this->modelRol);
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
        $this->modelRol = $this->modelRol->find($id);

        if ($this->modelRol == null){
            $numError = 400;
            $response = response()->json([ 'status'=>  $numError, 'success'=>'error', 'message'=> trans('errors.'.$numError ) ], $numError);
        }else {
            $this->modelRol->find($id)->delete();
            $numError = 200;
            $response = response()->json([ 'status'=>  $numError, 'success'=>'success',  'data'=> ['id'=> $id ]], $numError);
        }
        $this->CreateRegisterLog($response);
        return $response;
    }
}
