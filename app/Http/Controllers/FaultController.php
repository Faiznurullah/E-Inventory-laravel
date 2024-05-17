<?php

namespace App\Http\Controllers;

use App\Http\Requests\Fault as RequestFault;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Fault;
use App\Models\Item; 


class FaultController extends Controller
{
  private $item;
  private $fault;
  public function __construct(Item $item, Fault $fault)
  {
    $this->item = $item;
    $this->fault = $fault;
    $this->middleware(['auth','verified', 'checkRole:admin,user']);
  }
  
  
  public function create()
  {
    return view('dashboard.fault.add', [
      'datas' => $this->item->getGoodCondition()
    ]);
  }
  public function index()
  {
    
    return view('dashboard.fault.index', [
      'datas' => $this->item->getBadCondition()
    ]);
    
  }
  public function store(RequestFault $request)
  {    
    $dataItem = $this->item->getDataByCode($request->kode_barang);
    $data = [        
      'name' => $dataItem->name,          
      'jenis_barang' => $dataItem->jenis_barang,
      'kondisi' => 'rusak',
      'kode_barang' => $dataItem->kode_barang
    ]; 
    $this->fault->create($data); 
    $data = [
      'kondisi' => 'rusak'
    ]; 
    $this->item->updateData($dataItem->id, $data); 

    return redirect('/fault')->with('Pesan', 'Data Sukses Dikirim');    
    
  }
  
  public function download(){ 
    $x = $this->item->getBadCondition();
    view()->share('data', $x);
    $pdf = PDF::loadview('dashboard.fault.exportpdf')->setPaper('a4', 'portrait');;
    return $pdf->download('data-barang.pdf'); 
  }
  
}
