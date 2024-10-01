<?php

namespace App\Http\Controllers;

use App\Jobs\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function index(){
        return view('feedback.index');
    }

    public function post(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'text' => 'required|string|min:10|max:255',
        ]);

        if($validated){

            Feedback::dispatchAfterResponse($validated['email'], $validated['text']);

            return redirect()->route('feedback')->with('status', 'Письмо успешно отправленно!');
        }

    }
}
