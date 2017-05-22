<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fechaNacimiento' => ['required', 'date_format:yyyy-mm-dd'],
            'identificacion' => ['required', 'min:7'],
            'nombres' => ['required'],
            'apellidos' => ['required'],
            'userName' => ['required'],
            'correo' => ['required', 'email'],
            'contrasenia' => ['required', 'confirmed'],
            'idRol' => ['required', 'numeric', 'exists:roles,id_rol'],
            'idConjunto' => ['required', 'numeric','exists:conjuntos,id_conjunto'],
        ];
    }
}
