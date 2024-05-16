<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item as RequestsItem; 
use App\Models\Databarang;
use App\Models\Category;
use App\Models\Item;
use App\Models\Kerusakan; 
use Illuminate\Support\Facades\DB; 
use Barryvdh\DomPDF\Facade\PDF;

class ItemController extends Controller
{
    private $category;
    private $item;
    public function __construct(Category $category, Item $item)
    {
        $this->category = $category;
        $this->item = $item;
        $this->middleware(['auth','verified', 'checkRole:admin,user']);
    }
    public function create()
    {
        return view('dashboard.item.add', [
            'datas' =>  $this->category->getAllData()
        ]);
    }
    public function store(RequestsItem $request)
    {     
        if ($request->hasfile('foto')) {            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('foto-barang'), $filename);
            
            $urutan = rand(1000, 9999);
            $huruf = "BRG";
            $kodeBarang = $huruf . $urutan;
            
            $req = [              
                'name' => $request->name,
                'jenis_barang' => $request->jenis_barang,          
                'foto' =>$filename,
                'kondisi' => $request->kondisi,
                'tersedia' => $request->tersedia,
                'kode_barang' => $kodeBarang
                
            ];
            
            $this->item->create($req);
            
            return redirect('/item')->with('Pesan', 'Data Sukses Dikirim');
            
        }else{
            
            return redirect('/item')->with('Pesan', 'Wajib upload foto');
            
        }
        
    }
    public function index()
    {
        return view('dashboard.item.index', [
            'datas' => $this->item->getAllData()
        ]);
    }
    public function show($id)
    {
        
        $x = $this->item->findById($id);
        
        if(!$x){
            
            abort(404);
            
        }
        
        $data = [
            'datas' => $x,
        ];
        
        return view('dashboard.item.detail', $data);
        
    }
    public function destroy($id){
        
        $x = $this->item->findById($id);
        
        $file_name = $x->foto;
        $public_path = public_path('foto-barang/'.$file_name);
        unlink($public_path);
        
        //delete post
        $this->item->delete($id);
        
        //redirect to index
        return redirect('/item')->with('Pesan', 'Data Sukses Dihapus');
    }
    public function edit($id)
    {
        
        $x = $this->item->findById($id);
        $y = $this->category->getAllData();
        
        
        if(!$x){
            
            abort(404);
            
        }
        
        $data = [
            'item' => $x,
            'category' => $y
        ];
        
        return view('dashboard.item.edit', $data);
        
    }
    public function update($id, RequestsItem $request)
    {
        
        $x = $this->item->findById($id);
        
         
        if ($request->hasfile('foto') != null) {  
            
            
            $file_name = $x->foto;
            $public_path = public_path('foto-barang/'.$file_name);
            unlink($public_path);
            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('foto-barang'), $filename);
            
            $data = [
                'name' => $request->name,
                'jenis_barang' => $request->jenis_barang,
                'foto' => $filename,
                'kondisi' => $request->kondisi,
                'tersedia' => $request->tersedia
            ];

           $this->item->update($id, $data); 
            
            return redirect('/item')->with('Pesan', 'Data Sukses Diedit');
            
        }else{
            
            $data = [
                'name' => $request->name,
                'jenis_barang' => $request->jenis_barang,
                'kondisi' => $request->kondisi,
                'tersedia' => $request->tersedia
            ];

            $this->item->update($id, $data);  
            
            
            return redirect('/item')->with('Pesan', 'Data Sukses Diedit');
            
        }
        
        
        
    }
    public function download(){ 
        $x = $this->item->getWithCategory();
        view()->share('datas', $x);
        $pdf = PDF::loadview('dashboard.item.exportpdf')->setPaper('a4', 'portrait');;
        return $pdf->download('data-barang.pdf'); 
    }
    
}
