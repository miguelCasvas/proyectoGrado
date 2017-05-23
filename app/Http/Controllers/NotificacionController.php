<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreateRegisterLog;
use App\Http\Requests\Notificacion\StoreRequest;
use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    use CreateRegisterLog;

    private $modelNotificacion = Notificacion::class;

    function __construct()
    {
        $this->modelNotificacion = new Notificacion();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = response()->json(['data' => $this->modelNotificacion->all()]);
        $this->CreateRegisterLog($response);
        return $response;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $response = response()->json(['data' => $this->modelNotificacion->find($id)]);
        $this->CreateRegisterLog($response);

        return $response;
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $this->modelNotificacion->mensaje = $request->get('mensaje');
        $this->modelNotificacion->save();

        $response = response()->json(['data' => $this->modelNotificacion]);
        $this->CreateRegisterLog($response);

        return $response;
    }

    /**
     * @param StoreRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreRequest $request, $id)
    {
        $this->modelNotificacion = $this->modelNotificacion->find($id);

        if ($this->modelNotificacion == null)
            abort(400, trans('errors.901'));

        return $this->store($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->modelNotificacion = $this->modelNotificacion->find($id);

        if ($this->modelNotificacion == null)
            abort(400, trans('errors.901'));

        $this->modelNotificacion->delete();

        $response = response()->json(['data' => $id]);
        $this->CreateRegisterLog($response);

        return $response;
    }
}
