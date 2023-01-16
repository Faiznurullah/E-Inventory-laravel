<?php

namespace App\Http\Controllers;

use App\Models\Databarang;
use App\Models\Peminjaman;
use App\Models\Jenisbarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RelogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified', 'checkRole:admin,user']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $x = Jenisbarang::count();
        $y = Databarang::count();
        $z = Peminjaman::count();
        return view('dashboard.dashboard', compact('x', 'y', 'z'));

     

        
    }

    public function logout(Request $request)
    {
      Auth::logout();
      return redirect('/login');
    }



}
