<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class detallefacturaRequest extends FormRequest
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
            
    
            'cantidad' => 'required|min:3|max:255',
            'preciounitario' => 'required|min:3|max:255',
            'totallinea' => 'required|min:3|max:255',
        ];
    
    }
}
