<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiCommentController extends Controller
{

    public function create(Request $request)
    {
        $data = $request->json()->all();
        $validator = Validator::make($data, [
            'text' => 'required|string|min:2|max:255',
            'user_id' => 'required|integer',
            'post_id' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 401);
        }

        $comment = new Comment();

        $comment->text = $validator['email'];
        $comment->user_id = $validator['user_id'];
        $comment->post_id = $validator['post_id'];

        try{
            if($comment->save()){
                return response()->json(['status' => 'success', 'comment' => $comment]);
            }
        }catch (\Exception $exception){
            return response()->json(['status' => 'fail', 'error' => $exception->getMessage()]);
        }

    }

}
