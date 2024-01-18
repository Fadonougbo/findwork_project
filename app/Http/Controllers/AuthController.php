<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('laragigs.user_auth.register');
    }

    public function store(UserAuthRequest $request) {
        $data=$request->validated();
   
       $newUser=User::create($data);
        
       if($newUser) {
            $request->session()->regenerate();
            Auth::attempt($data);
            
       }
       

        return redirect()->route('listings.index');
    }

    public function login() {
        return view('laragigs.user_auth.login');
    }

    public function authentication(UserLoginRequest $request) {
        $data=$request->validated();
        $isLogged=Auth::attempt($data);
        if(!$isLogged) { 
            return redirect()->route('auth.login')
                            ->with('error','Error! you are not logged')
                            ->withInput([
                                'email'=>$request->input('email')
                            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('listings.index')->with('success','You are now logged in');

    }

    public function logout(Request $request ) {
        Auth::logout();
        $request->session()->regenerate();

        return redirect()->route('auth.login')->with('success','You have been logged out');
    }
}
