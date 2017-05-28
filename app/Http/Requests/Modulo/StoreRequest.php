<?php

namespace App\Http\Requests\Modulo;

use App\Http\Requests\FormRequestToAPI\FormRequestToAPI;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequestToAPI
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombreModulo' => ['required']
        ];
    }
}