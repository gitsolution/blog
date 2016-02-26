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
            'name'=>'required|alpha|min:2|max:70|max:255',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
    }

     public function messages()
    {
        return [
            'name.required'=>'Por favor complete su nombre',
            'name.alpha'=>'El nombre solo debe contener letras',
            'name.min'=>'El nombre debe tener al menos 2 caracteres',
            'name.max'=>'El nombre debe tener máximo 70 caracteres',

            'g-recaptcha-response.required'=>'El campo captcha es requerido',
            'g-recaptcha-response.recaptcha'=>'Captcha incorrecto',

        ];
    }
}
