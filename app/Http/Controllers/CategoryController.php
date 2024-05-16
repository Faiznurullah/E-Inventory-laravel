<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category as RequestsCategory;
use App\Models\Category;   
use Barryvdh\DomPDF\Facade\PDF; 

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->middleware(['auth','verified', 'checkRole:admin']);
    }
    public function create()
    {
        return view('dashboard.category.add');
    }
    public function index()
    {
        return view('dashboard.category.index', [
            'datas' => $this->category->getAllData()
        ]);
    }
    public function store(RequestsCategory $request)
    {
        
        $this->category->create($request->all());
        
        return redirect('/category')->with('Pesan', 'Data Sukses Dikirim');
        
    }
    public function edit($id)
    {
        
        $x = $this->category->findById($id); 
        
        if(!$x){  
            abort(404); 
        }
        
        $data = [
            'data' => $x,
        ];
        
        return view('dashboard.category.edit', $data);
        
    }
    public function update($id, RequestsCategory $request)
    {
        
        $req = [
            'name' => $request->name
        ];
        
        $this->category->updateData($id, $req);
        
        
        return redirect('/category')->with('Pesan', 'Data Sukses Diedit');


    }
    public function destroy($id){
        $this->category->deleteById($id);  
        return redirect('/category')->with('Pesan', 'Data Sukses Dihapus');
    }
    
    public function downloadpdf(){
        $x = $this->category->getAllData();
        view()->share('jenis_barang', $x);
        $pdf = PDF::loadview('dashboard.category.exportpdf')->setPaper('a4', 'portrait');;
        return $pdf->download('data-jenis-barang.pdf');    
    }
}
