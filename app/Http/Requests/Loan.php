<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Loan extends FormRequest
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
             'peminjam' => 'required',
             'user_id' => 'required',
             'surat' =>  'required',
             'surat' =>  'image|mimes:jpg,jpeg,png|max:2000',
             'kondisi' =>  'required',
             'tersedia' =>  'required',
         ];
     }
 
     public function messages() 
     {
         return [
             'name.string' => ':attributes wajib teks', 
             'name.required' => ':attributes wajib ada', 
             'peminjam.required' => ':attributes wajib ada',
             'user_id.required' => ':attributes wajib ada',
             'surat.required' => ':attributes wajib ada',
             'surat.image' => ':attributes wajib gambar',
             'kondisi.required' => ':attributes wajib ada',
             'tersedia.required' => ':attributes wajib ada' 
         ];
     }
 
     public function attributes() 
     {
         return [
             'name' => 'Name',
             'peminjam' => 'Peminjam',
             'user_id' => 'User Id',
             'surat' => 'Surat', 
             'kondisi' => 'Kondisi',
             'tersedia' => 'Tersedia',
         ];
     }

}
