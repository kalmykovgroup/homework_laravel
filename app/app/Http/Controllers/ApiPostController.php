<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiPostController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->json()->all();
        $validator = Validator::make($data, [
            'text' => 'required|string|min:2|max:255',
            'user_id' => 'required|integer',
            'mark' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 401);
        }

        $post = new Post();

        $post->text = $validator['text'];
        $post->user_id = $validator['user_id'];
        $post->mark = $validator['mark'];

        try{
            if($post->save()){
                return response()->json(['status' => 'success', 'post' => $post]);
            }
        }catch (\Exception $exception){
            return response()->json(['status' => 'fail', 'error' => $exception->getMessage()]);
        }

    }
}
