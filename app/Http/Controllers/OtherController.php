<?php

namespace App\Http\Controllers;

use App\Models\Databarang;
use App\Models\Peminjaman;
use App\Models\Jenisbarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OtherController extends Controller
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

    public function chart()
    {
      
        $label         = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        for($bulan=1;$bulan < 13;$bulan++){
        $chartuser     = collect(DB::SELECT("SELECT count(id) AS jumlah from users where month(created_at)='$bulan'"))->first();
        $jumlah_user[] = $chartuser->jumlah;
        }

        for($bulan=1;$bulan < 13;$bulan++){
            $peminjaman     = collect(DB::SELECT("SELECT count(id) AS jumlah1 from peminjaman_barang where month(created_at)='$bulan'"))->first();
            $peminjaman_barang[] = $peminjaman->jumlah1;
            }

         
            $baik = Databarang::where('kondisi', 'baik')->count();
            $rusak = Databarang::where('kondisi', 'rusak')->count();
            $jumlah_brng = Databarang::count();

        return view('dashboard.chart', compact('jumlah_user','label', 'peminjaman_barang', 'baik', 'rusak', 'jumlah_brng'));
        
    }


}
