<?php

namespace App\Http\Controllers;

use App\Http\Requests\kerusakanbarang;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Kerusakan;
use App\Models\Databarang;
use Illuminate\Http\Request;


class FaultController extends Controller
{
   
    public function __construct()
    {
        $this->middleware(['auth','verified', 'checkRole:admin,user']);
    }
    

    public function tambah()
    {
      return view('dashboard.kerusakan.tambah', [
        'databarang' => Databarang::where('kondisi', 'baik')->get()
       ]);
    }
    public function data()
    {
      
      return view('dashboard.kerusakan.data', [
        'kerusakan' => Databarang::where('kondisi', 'rusak')->get()
       ]);

    }
    public function insert(kerusakanbarang $request)
    {       
       
        $databarang = Databarang::where('kode_barang', $request->kode_barang)->first();
      
           Kerusakan::create([        
                'name' => $databarang->name,          
                'jenis_barang' => $databarang->jenis_barang,
                'kondisi' => 'rusak',
                'kode_barang' => $databarang->kode_barang
            ]);

            Databarang::where('kode_barang', $databarang->kode_barang)
             ->update([
                    'kondisi' => 'rusak'
             ]);
    
        return redirect('/databarangrusak')->with('Pesan', 'Data Sukses Dikirim');    
       
    }

    public function downloadpdf(){

        $x = Databarang::where('kondisi', 'rusak')->get();
        view()->share('data_barang', $x);
        $pdf = PDF::loadview('dashboard.kerusakan.exportpdf')->setPaper('a4', 'portrait');;
        return $pdf->download('data-barang.pdf');
    
       }

}
