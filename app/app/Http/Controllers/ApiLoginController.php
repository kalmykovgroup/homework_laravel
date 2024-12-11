<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiLoginController extends Controller
{

    public function login(Request $request)
    {
        $data = $request->json()->all();
        $validator = Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 401);
        }

        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password)){
            return response()->json(['status' => 'fail', 'message' => 'Invalid credentials'], 401);
        }


        return response()->json(['status' => 'success', 'user' => $user]);



    }
}
