<?php

namespace App\Http\Requests\UsuarioExtension;

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
            'idExtension' => ['numeric', 'exists:extensiones,id_extension'],
            'idUsuario' => ['numeric', 'exists:usuarios,id_usuario'],
        ];
    }
}
