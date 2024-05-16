<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Item extends FormRequest
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
            'foto' => 'required', 
            'foto' => 'image|mimes:jpg,jpeg,png|max:2000', 
            'kondisi' => 'required',
            'tersedia' => 'required'
        ];
    }

    public function messages() 
    {
        return [
            'name.string' => ':attributes wajib teks', 
            'name.required' => ':attributes wajib ada', 
            'jenis_barang.required' => ':attributes wajib ada', 
            'foto.required' => ':attributes wajib ada', 
            'foto.image' => ':attributes wajib gambar', 
            'kondisi.required' => ':attributes wajib ada', 
            'tersedia.required' => ':attributes wajib ada', 
        ];
    }

    public function attributes() 
    {
        return [
            'name' => 'Name', 
            'jenis_barang' => 'Jenis Barang', 
            'foto' => 'Foto', 
            'kondisi' => 'Kondisi', 
            'tersedia' => 'Tersedia', 
        ];
    }

}
