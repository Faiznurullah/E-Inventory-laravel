<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
     
    public function tambah(){

        return view('dashboard.pengguna.add');
    }

    public function insert(Request $request){
        
        $hashedPassword = Hash::make($request->password);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'kelas' => $request->kelas,
            'email_verified_at' => now()
        ];

       $data_insert = User::create($data);

       return redirect('/dataakun')->with('Pesan', 'Data Sukses Dikirim');
        
    }

    public function data(){
        return view('dashboard.pengguna.index',  [
            'data' => User::where('id', '!=', Auth::user()->id)->get()
           ]);
    }

    public function edit($id)
    {
        $x = User::find($id);

        if(!$x){ 
        abort(404); 
        }

        $data = [
            'data' => $x,
        ];

        return view('dashboard.pengguna.edit', $data);
        
    }

    public function update(Request $request, $id){

        $hashedPassword = Hash::make($request->password);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'kelas' => $request->kelas 
        ];
        
        User::where('id', $id)
        ->update($data);


     return redirect('/dataakun')->with('Pesan', 'Data Sukses Diedit');

    }

    public function hapus($id){
        $x = User::find($id);
        $x->delete();
        return redirect('/dataakun')->with('Pesan', 'Data Sukses Dihapus');

     }

     public function downloadpdf(){ 
        $x = User::all();
        view()->share('data', $x);
        $pdf = PDF::loadview('dashboard.pengguna.exportpdf')->setPaper('a4', 'portrait');;
        return $pdf->download('data-pengguna.pdf'); 
       }

}
