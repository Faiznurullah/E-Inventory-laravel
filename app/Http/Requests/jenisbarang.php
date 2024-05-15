<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class jenisbarang extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() 
    {
        return [ 
            'name' => 'string', 
            'name' => 'required', 
        ];
    }

    public function messages() 
    {
        return [
            'name.string' => ':attributes wajib teks', 
            'name.required' => ':attributes wajib ada', 
        ];
    }

    public function attributes() 
    {
        return [
            'name' => 'Name', 
        ];
    }

}
