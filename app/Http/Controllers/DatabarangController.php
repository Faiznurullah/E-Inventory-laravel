<?php

namespace App\Http\Controllers;

use file;
use App\Models\Databarang;
use App\Models\Jenisbarang;
use App\Models\Kerusakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Facade\FlareClient\Stacktrace\File as StacktraceFile;
use Barryvdh\DomPDF\Facade\PDF;

class DatabarangController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified', 'checkRole:admin,user']);
    }
    public function tambah()
    {
      
      return view('dashboard.databarang.tambah', [
        'jenisbarang' => Jenisbarang::all()
       ]);
    }
    public function insert(Request $request)
    {       
         
     

        $request->validate([
            'name' => 'required',
            'jenis_barang' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2000',
            'kondisi' => 'required',
            'tersedia' => 'required'
        ],[
            'name.required' => 'Nama Wajib Diisi !!!',
            'jenis_barang.required' => 'Jenis Barang Wajib Diisi !!!',
            'foto.required' => 'Foto Wajib Diisi !!!',
            'foto.mimes' => 'Hanya File Gambar !!!',
            'kondisi.required' => 'Kondisi Wajib Diisi !!!',
            'tersedia.required' => 'Ketersediaan Wajib Diisi !!!',
        ]);

        if ($request->hasfile('foto')) {            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('foto-barang'), $filename);

            $urutan = rand(1000, 9999);
            $huruf = "BRG";
            $kodeBarang = $huruf . $urutan;

             Databarang::create(
                    [              
                        'name' => $request->name,
                        'jenis_barang' => $request->jenis_barang,          
                        'foto' =>$filename,
                        'kondisi' => $request->kondisi,
                        'tersedia' => $request->tersedia,
                        'kode_barang' => $kodeBarang

                    ]
                );
                return redirect('/databarang')->with('Pesan', 'Data Sukses Dikirim');
        }else{
            
        }
       
    }
    public function data()
    {
      return view('dashboard.databarang.data', [
        'databarang' => Databarang::all()
       ]);
    }
    public function detail($id)
    {

       $x = Databarang::find($id);

        if(!$x){

            abort(404);

        }

        $detail = [
            'databarang' => $x,
        ];

        return view('dashboard.databarang.detail', $detail);

    }
    public function hapus($id){

               $x = Databarang::find($id);
                 
                 $file_name = $x->foto;
                 $public_path = public_path('foto-barang/'.$file_name);
                 unlink($public_path);

                //delete post
                $x->delete();
        
                //redirect to index
                return redirect('/databarang')->with('Pesan', 'Data Sukses Dihapus');
    }
    public function edit($id)
    {

        $x = DB::table('data_barang')->where('id', $id)->first();
        $y = Jenisbarang::all();


        if(!$x){

        abort(404);

        }

        $data = [
            'databarang' => $x,
            'jenisbarang' => $y
        ];

        return view('dashboard.databarang.edit', $data);
        
    }
    public function update($id, Request $request)
    {
        
        $x = Databarang::find($id);
                 
        $request->validate([
            'name' => 'required',
            'jenis_barang' => 'required',
            'kondisi' => 'required',
            'tersedia' => 'required'
        ],[
            'name.required' => 'Nama Wajib Diisi !!!',
            'jenis_barang.required' => 'Jenis Barang Wajib Diisi !!!',
            'kondisi.required' => 'Kondisi Wajib Diisi !!!',
            'tersedia.required' => 'Ketersediaan Wajib Diisi !!!',
        ]);

        

        if ($request->hasfile('foto') != null) {  

            
            $file_name = $x->foto;
            $public_path = public_path('foto-barang/'.$file_name);
            unlink($public_path);

            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('foto-barang'), $filename);
            Databarang::where('id', $id)
             ->update([
                    'name' => $request->name,
                    'jenis_barang' => $request->jenis_barang,
                    'foto' => $filename,
                    'kondisi' => $request->kondisi,
                    'tersedia' => $request->tersedia
             ]);

             Kerusakan::where('kode_barang', $x->kode_barang)
             ->update([
                    'kondisi' => 'baik'
             ]);


            return redirect('/databarang')->with('Pesan', 'Data Sukses Diedit');

        }else{

            Databarang::where('id', $id)
             ->update([
                    'name' => $request->name,
                    'jenis_barang' => $request->jenis_barang,
                    'kondisi' => $request->kondisi,
                    'tersedia' => $request->tersedia
             ]);

             Kerusakan::where('kode_barang', $x->kode_barang)
             ->update([
                    'kondisi' => 'baik'
             ]);


             return redirect('/databarang')->with('Pesan', 'Data Sukses Diedit');
            
        }

       
       
    }
    public function downloadpdfbarang(){

        $x = DB::table('data_barang')->get();
        view()->share('data_barang', $x);
        $pdf = PDF::loadview('dashboard.databarang.exportpdf')->setPaper('a4', 'portrait');;
        return $pdf->download('data-barang.pdf');
    
       }

}
