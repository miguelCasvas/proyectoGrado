<?php namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Http\Requests\Permiso\StoreRequest;
use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    use CreateRegisterLog;

    private $modelPermiso = Permiso::class;

    function __construct()
    {
        $this->modelPermiso = new Permiso();
    }

    /**
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $this->modelPermiso->nombre_permiso = $request->get('nombrePermiso');
        $this->modelPermiso->id_estado = $request->get('idEstado');
        $this->modelPermiso->id_roles = '.';
        $this->modelPermiso->save();
        $this->CreateRegisterLog(json_encode(['data' => $this->modelPermiso]));

        return response()->json(['data' => $this->modelPermiso]);
    }

    /**
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreRequest $request, $id)
    {
        $this->modelPermiso = $this->modelPermiso->find($id);

        if ($this->modelPermiso == null)
            abort(400, trans('error.901'));

        $this->modelPermiso->nombre_permiso = $request->get('nombrePermiso');
        $this->modelPermiso->id_estado = $request->get('idEstado');
        $this->modelPermiso->id_roles = '.';
        $this->modelPermiso->save();
        $this->CreateRegisterLog(json_encode(['data' => $this->modelPermiso]));

        return response()->json(['data' => $this->modelPermiso]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->modelPermiso->all();
        $response = response()->json([ 'data' => $data ]);

        # Creacion en modelo log
        $this->CreateRegisterLog($response);
        return $response;
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = $this->modelPermiso->find($id);
        $response = response()->json([ 'data' => $data ]);

        # Creacion en modelo log
        $this->CreateRegisterLog($response);
        return $response;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->modelPermiso = $this->modelPermiso->find($id);

        if ($this->modelPermiso == null)
            abort(400, trans('errors.901'));

        $response = response()->json(['data' => $id]);
        $this->modelPermiso->delete();
        $this->CreateRegisterLog($response);

        return $response;
    }

}
