<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clienteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            'nombre' => 'required|min:3|max:255',
            'apellido' => 'required|min:3|max:255',
            'direccion' => 'required|min:3|max:255',
            'fechanacimiento' =>'required|min:3|max:255',
            'telefono' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255',
            'fecharegistro' => 'required|min:3|max:255',
            'genero' => 'required|min:3|max:255',
        
        ];
    }
}
