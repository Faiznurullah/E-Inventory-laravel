<?php

namespace App\Http\Controllers;

use App\Http\Requests\Loan;
use App\Http\Requests\peminjamanbarang;
use App\Models\Databarang;
use App\Models\Item;
use App\Models\Jenisbarang;
use App\Models\Loan as ModelsLoan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    private $item;
    private $loan;
    public function __construct(Item $item, ModelsLoan $loan)
    {
        $this->item = $item;
        $this->loan = $loan;
        $this->middleware(['auth','verified', 'checkRole:admin,user']);
    }
    public function create()
    {

      return view('dashboard.loan.add', [
        'datas' => $this->item->getDataReady(),
       ]);
    }
    public function store(Loan $request)
    {     

        if ($request->hasfile('surat')) {            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('surat')->getClientOriginalName());
            $request->file('surat')->move(public_path('surat-peminjaman'), $filename);

           $databarang = $this->item->getDataByCode($request->kode_barang);
           $peminjam = Auth::user()->name;
           $id = Auth::user()->id;
           $name = $databarang->name;
           $kondisi = $databarang->kondisi;
           $tersedia = $databarang->tersedia;

           $data = [              
            'peminjam' => $peminjam,
            'name' => $name,  
            'user_id' => Auth::user()->id,  
            'kode_barang' => $request->kode_barang,
            'surat' => $filename,
            'kondisi' => $kondisi,
            'tersedia' => $tersedia
           ];
           
           $this->loan->create($data);

        
        return redirect('/loan')->with('Pesan', 'Data Sukses Dikirim');
                
        }
       
    }
    public function index()
    {
        if(Auth::user()->kelas === 'admin'){

      return view('dashboard.loan.index', [
        'datas' => $this->loan->getAllData(),
       ]);

    }elseif(Auth::user()->kelas === 'user'){

        return view('dashboard.loan.index', [
            'datas' => $this->loan->getDataByUserId(Auth::user()->id)
           ]);
    

    }

    }
    public function loan($id){

        $x = $this->loan->getDataByUserId($id);
        $data = ['tersedia' => 'tidak'];

        $this->item->updateDataByCode($x->kode_barang, $data);

        $this->loan->update($id, $data);

       return redirect('/loan')->with('Pesan', 'Data Sukses Diverifikasi');   


    }
    // public function kembali()
    // {

    //    return view('dashboard.peminjaman.kembali', [
    //     'data' => Peminjaman::where(['user_id' => Auth::user()->id, 'peminjam' => Auth::user()->name, 'tersedia' => 'tidak'])->get(),
    //    ]);

    // }
    public function return(Loan $request){
           
        $x =  $this->loan->findById($request->id); 

        if ($request->hasfile('foto') && $x->foto == null) {  
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('foto-kembali'), $filename);

             $data = [
                'tersedia' => 'kembali',
                'foto' => $filename
             ];

             $this->loan->update($x->id, $data);

         return redirect('/loan')->with('Pesan', 'Data Sukses Dikirim');

        }
        
    }

    public function returnbyid($id){

        $x = $this->loan->findById($id); 
        $data = ['tersedia' => 'selesai'];

        $this->item->updateDataByCode($x->kode_barang, $data);

        $this->loan->update($id, $data);

      return redirect('/loan')->with('Pesan', 'Data Sukses Diselesaikan');

    }
}
