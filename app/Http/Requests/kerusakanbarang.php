<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kerusakanbarang extends FormRequest
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
            'jenis_barang' => 'required',
            'kondisi' => 'required',
            'kode_barang' => 'required'
        ];
    }

    public function messages() 
    {
        return [
            'name.string' => ':attributes wajib teks', 
            'name.required' => ':attributes wajib ada', 
            'jenis_barang.required' => ':attributes wajib ada', 
            'kondisi.required' => ':attributes wajib ada', 
            'kode_barang.required' => ':attributes wajib ada' 
        ];
    }

    public function attributes() 
    {
        return [
            'name' => 'Name', 
            'jenis_barang' => 'Jenis Barang', 
            'kondisi' => 'Kondisi', 
            'kode_barang' => 'Kode Barang', 
        ];
    }
    
}
