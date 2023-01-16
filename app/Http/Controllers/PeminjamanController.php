<?php

namespace App\Http\Controllers;

use App\Models\Databarang;
use App\Models\Jenisbarang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified', 'checkRole:admin,user']);
    }
    public function tambah()
    {

      return view('dashboard.peminjaman.tambah', [
        'data' => Databarang::where('tersedia', 'ya')->get(),
       ]);
    }
    public function insert(Request $request)
    {       
         
        $request->validate([
            'kode_barang' => 'required',
            'surat' => 'required|mimes:jpg,jpeg,png,pdf|max:2000'
        ],[
            'kode_barang.required' => 'Nama Wajib Diisi !!!',
            'surat.required' => 'Foto Wajib Diisi !!!',
            'surat.mimes' => 'Hanya File Gambar Dan Pdf !!!'
        ]);


        if ($request->hasfile('surat')) {            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('surat')->getClientOriginalName());
            $request->file('surat')->move(public_path('surat-peminjaman'), $filename);

           $databarang = Databarang::where('kode_barang', $request->kode_barang)->first();
           $peminjam = Auth::user()->name;
           $id = Auth::user()->id;
           $name = $databarang->name;
           $kondisi = $databarang->kondisi;
           $tersedia = $databarang->tersedia;
           
           Peminjaman::create(
            [              
                'peminjam' => $peminjam,
                'name' => $name,          
                'name_id' => $id,
                'kode_barang' => $request->kode_barang,
                'surat' => $filename,
                'kondisi' => $kondisi,
                'tersedia' => $tersedia
            ]
        );

        
        return redirect('/datapeminjaman')->with('Pesan', 'Data Sukses Dikirim');
                
        }
       
    }
    public function data()
    {
      return view('dashboard.peminjaman.data', [
        'peminjaman' => Peminjaman::all()
       ]);
    }
    public function verifikasipeminjaman($id){

        $x = Peminjaman::find($id);

        Databarang::where('kode_barang', $x->kode_barang)
             ->update([
                    'tersedia' => 'tidak'
             ]);

         Peminjaman::where('id', $id)
             ->update([
                    'tersedia' => 'tidak'
             ]);

       return redirect('/datapeminjaman')->with('Pesan', 'Data Sukses Diverifikasi');   


    }
    public function kembali()
    {

       return view('dashboard.peminjaman.kembali', [
        'data' => Peminjaman::where(['name_id' => Auth::user()->id, 'peminjam' => Auth::user()->name, 'tersedia' => 'tidak'])->get(),
       ]);

    }
    public function verifikasikembali(Request $request){
           
        $x =  Peminjaman::where('id', $request->id)->first();


        $request->validate([
            'id' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2000'
        ],[
            'id.required' => 'Kode Barang Wajib Diisi !!!',
            'foto.required' => 'Foto Wajib Diisi !!!',
            'foto.mimes' => 'Hanya File Gambar Dan Pdf !!!'
        ]);

        if ($request->hasfile('foto') && $x->foto == null) {  
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('foto-kembali'), $filename);

            Peminjaman::where('id', $x->id)
             ->update([
                    'tersedia' => 'kembali',
                    'foto' => $filename
             ]);

         return redirect('/datapeminjaman')->with('Pesan', 'Data Sukses Dikirim');

        }
        
    }

    public function verifikasipengembalian($id){

        $x = Peminjaman::find($id);

        Databarang::where('kode_barang', $x->kode_barang)
        ->update([
               'tersedia' => 'ya'
        ]);

    Peminjaman::where('id', $id)
        ->update([
               'tersedia' => 'selesai'
        ]);

    return redirect('/datapeminjaman')->with('Pesan', 'Data Sukses Diselesaikan');

    }
}
