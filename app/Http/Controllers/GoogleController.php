<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
  
    
    //tambahkan script di bawah ini
    public function redirecToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
  
  
    //tambahkan script di bawah ini 
    public function handleGoogleCallback(Request $request)
    {
        try {
            $user_google    = Socialite::driver('google')->user();
            $user           = User::where('email', $user_google->getEmail())->first(); 

            if($user !== null){
                auth()->login($user, true); 
                return redirect()->route('index');
            }else{
                $create = User::Create([
                    'email'             => $user_google->getEmail(),
                    'name'              => $user_google->getName(),
                    'google_id'         => $user_google->getId(),
                    'kelas'             => 'user',
                    'password'          => 0, 
                ]);
        
                
                auth()->login($create, true);
                $request->user()->sendEmailVerificationNotification();
                return view('auth.verify')->with('status', 'verification-link-sent');
            }

        } catch (\Exception $e) { 
         return redirect()->route('utama')->with('status', 'Gagal Masuk');
        }


    }

}
