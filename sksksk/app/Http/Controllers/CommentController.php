<?php

namespace App\Http\Controllers;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;



class CommentController extends Controller
{
    public function getComment(){
        // $data = myModel::first();
        // return $data->User;
        $model = comment::where('is_active', '1')->with('User', 'myModel')->get();
        return response()->json($model);

        
    }
    public function insertComment(request $request){
        $insertData = [
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id,
            'body' => $request->comment

        ];

        comment::create($insertData);

        return [
            "status" => 200,
            "message" => "comment post success",
            "data" => $insertData
        ];
    }
}
