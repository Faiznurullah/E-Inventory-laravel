<?php

namespace App\Http\Controllers;

use App\Http\Requests\jenisbarang as RequestsJenisbarang;
use App\Models\Jenisbarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

class JenisbarangController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified', 'checkRole:admin']);
    }
    public function tambah()
    {
      return view('dashboard.jenisbarang.tambah');
    }
    public function data()
    {
      return view('dashboard.jenisbarang.data', [
        'jenisbarang' => Jenisbarang::all()
       ]);
    }
    public function insert(RequestsJenisbarang $request)
    {
       Request()->validate([
           'name' => 'required'
       ],[
           'name.required' => 'Nama Wajib Diisi !!!'
       ]);

       Jenisbarang::create([
           'name' => request('name')
       ]);

   return redirect('/datajenisbarang')->with('Pesan', 'Data Sukses Dikirim');
    
}
    public function edit($id)
    {

        $x = DB::table('jenis_barang')->where('id', $id)->first();


        if(!$x){

        abort(404);

        }

        $data = [
            'jenisbarang' => $x,
        ];

        return view('dashboard.jenisbarang.edit', $data);
        
    }
    public function update($id, RequestsJenisbarang $request)
    {
        
        Request()->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Nama Wajib Diisi !!!'
        ]);


        $santri = Jenisbarang::where('id', $id)
             ->update([
                    'name' => $request->name
             ]);


        return redirect('/datajenisbarang')->with('Pesan', 'Data Sukses Diedit');
    }
    public function hapus($id){

      $x = Jenisbarang::find($id);
      $x->delete();
      return redirect('/datajenisbarang')->with('Pesan', 'Data Sukses Dihapus');

   }
   public function downloadpdf(){

    $x = DB::table('jenis_barang')->get();
    view()->share('jenis_barang', $x);
    $pdf = PDF::loadview('dashboard.jenisbarang.exportpdf')->setPaper('a4', 'portrait');;
    return $pdf->download('data-jenis-barang.pdf');

   }
}
