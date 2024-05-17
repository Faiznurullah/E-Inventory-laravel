<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Databarang;
use App\Models\Item;
use App\Models\Peminjaman;
use App\Models\Jenisbarang;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OtherController extends Controller
{
 
    private $item;
    private $category;
    private $loan;
    private $user;
    public function __construct(Item $item, Category $category, Loan $loan, User $user)
    {
        $this->item = $item;
        $this->category = $category;
        $this->loan = $loan;
        $this->user = $user;
        $this->middleware(['auth','verified', 'checkRole:admin,user']);
    }

    
    public function index()
    {
        $x = $this->item->count();
        $y = $this->category->count();
        $z = $this->loan->count();
        $a = $this->user->getDataById(Auth::user()->id);

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

         
            $baik = $this->item->goodDataCount();
            $rusak = $this->item->badDataCount();
            $jumlah_brng = $this->item->count();

         return view('dashboard.chart', compact('jumlah_user','label', 'peminjaman_barang', 'baik', 'rusak', 'jumlah_brng'));
        
    }


}
