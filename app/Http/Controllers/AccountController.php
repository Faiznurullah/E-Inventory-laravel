<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware(['auth','verified', 'checkRole:admin']);
    }

     
    public function create(){
        return view('dashboard.user.add');
    }

    public function store(Request $request){
        
        $hashedPassword = Hash::make($request->password);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'kelas' => $request->kelas,
            'email_verified_at' => now()
        ];

        $this->user->create($data);

       return redirect('/user')->with('Pesan', 'Data Sukses Dikirim');
        
    }

    public function index(){
        return view('dashboard.user.index',  [
            'datas' => User::where('id', '!=', Auth::user()->id)->get()
           ]);
    }

    public function edit($id)
    {
        $x = $this->user->findById($id);

        if(!$x){ 
        abort(404); 
        }

        $data = [
            'datas' => $x,
        ]; 

        return view('dashboard.user.edit', $data);
        
    }

    public function update(Request $request, $id){

        $hashedPassword = Hash::make($request->password);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'kelas' => $request->kelas 
        ]; 
        
         $this->user->update($id, $data);

     return redirect('/user')->with('Pesan', 'Data Sukses Diedit');

    }

    public function hapus($id){
        $this->user->delete($id);
        return redirect('/user')->with('Pesan', 'Data Sukses Dihapus');

     }

     public function download(){ 
        $x = $this->user->getAllData();
        view()->share('datas', $x);
        $pdf = PDF::loadview('dashboard.user.exportpdf')->setPaper('a4', 'portrait');;
        return $pdf->download('data-pengguna.pdf'); 
       }

}
