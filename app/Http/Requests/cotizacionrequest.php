<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class cotizacionrequest extends Request
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
            'g-recaptcha-response' => 'required|recaptcha',
        ];
    }

     public function messages()
    {
        return [
            'g-recaptcha-response.required'=>'El campo captcha es requerido',
            'g-recaptcha-response.recaptcha'=>'Captcha incorrecto',

        ];
    }
}
