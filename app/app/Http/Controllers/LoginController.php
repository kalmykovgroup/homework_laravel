<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        return view('login.login');
    }


    public function login(Request $request){

        $validated = $request->validate([
            "email" => 'required|email',
            'password' => 'required|min:5|max:255'
        ]);


        if(Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->with()->errors('status', [
            'email' => "Email or password incorrect."
        ])->onlyInput('email');

    }

    public function recover(){
        return view('login.recover');
    }

    public function recover_password(Request $request){

        $validated = $request->validate([
            "email" => 'required|email',
        ]);

        if($validated){
            return redirect()->route('login.recover')->with('status', 'Письмо с паролем, успешно отправленно на вашу почту!');
        }

    }
}
