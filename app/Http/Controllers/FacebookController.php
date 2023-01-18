<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirecToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handlefacebookCallback(){
        try {

         $user = Socialite::driver('facebook')->user();
         $finduser = User::where('facebook_id', $user->getId())->first();
         if($finduser){
            
           Auth::login($finduser);
           return redirect()->intended('/dashboard');

         }else{
            $newUser = User::updateOrCreate([ 'email' => $user->getEmail() ], [
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'facebook_id' => $user->getId(),
                        'password' => Hash::make('Password'),
                        'email_verified_at' => now()
            ]);

            Auth::login($newUser);

            return redirect()->intended('/dashboard');
         } 

         }catch (Exception $e){
              
            dd($e->getMessage());
         }


        }
}
