<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("login.registration");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([ 
            "name" => 'required|min:2|max:255',
            "email" => 'required|email',
            'password' => 'required|min:5|max:255'
        ]);  

        $user = new User();

        $user->email = $validated['email'];
        $user->name = $validated['name'];
        $user->password = $validated['password'];

        $user->save();

        return redirect()->route('login')->with('status', 'User created');
    }

}
