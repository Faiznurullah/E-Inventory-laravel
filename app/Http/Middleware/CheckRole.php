<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
   
    public function handle(Request $request, Closure $next, ...$roles)
    {
      
           if(in_array($request->user()->kelas, $roles)){
              return $next($request);
           }

        return redirect('/dashboard')->with('Pesan', 'Maaf Anda Bukan Admin');
       
    }
    
}
