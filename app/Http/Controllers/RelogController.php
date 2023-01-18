<?php

namespace App\Http\Controllers;

use App\Models\Databarang;
use App\Models\Peminjaman;
use App\Models\Jenisbarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RelogController extends Controller
{
 
    public function __construct()
    {
        $this->middleware(['auth','verified', 'checkRole:admin,user']);
    }

    
    public function index()
    {
        $x = Jenisbarang::count();
        $y = Databarang::count();
        $z = Peminjaman::count();
        $a = User::where('id', Auth::user()->id)->first();

        return view('dashboard.dashboard', compact('x', 'y', 'z', 'a'));

    
        
    }

    public function logout(Request $request)
    {
      Auth::logout();
      return redirect('/login');
    }



}
