<?php

namespace App\Http\Controllers;
use App\Models\myModel;
use App\Models\bookmark;
use App\Models\like;
use App\Models\User;
use App\Models\follows;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;

class myModController extends Controller
{
    public function getPost(){
        // $data = myModel::first();
        // return $data->User;
        $model = myModel::where('is_active', '1')->orderBy('id', 'desc')->with('comment.User', 'User', 'like.User')->get();
        $data = DB::table('users')
        ->select('created_at')
        ->get();
        
        // $user = myModel::all();
        
        $data2 = myModel::orderBy('id', 'desc')->get();

        $res = [];
        for($i = 0; $i < count(myModel::all()); $i++ ){
            $res[] = $data2[$i]->created_at->diffForHumans();
        }
        // return $data2;
        return [
            "post" => $model,
            "time" => $res
        ];

    }

    public function getBookmarkPost(){
        // $data = myModel::first();
        // return $data->User;
        
        // ->
        return bookmark::where('user_id', auth()->user()->id)->with(['myModel.user','myModel.comment.User', 'myModel.like.User'])->get();
        // ddd($model);
        // return response()->json($model);

        
    }

    public function insertpostcaption(request $request){
        // dd($request);
        $insertData = [
            "caption" => $request->caption
        ];

        myModel::where('id', $request->id)->update($insertData);
        // myModel::->where(); 

        return [
            "status" => 200,
            "message" => "postingan berhasil di upoload",
            "data" => $insertData
        ];

    }

    public function insertpostimage(request $request){
        $insertData =[
            "body" => $request->file("post")->store('post-images'),
            "user_id" => auth()->user()->id,
            "caption" => "a"
        ];

        $var = myModel::create($insertData);

        return [
            "status" => 200,
            "message" => "postingan berhasil di upoload",
            "data" => $var
        ];

    }

    public function bookmarkAct(request $request){
        $insertData = [
            "post_id"  => $request->post_id,
            "user_id"  => auth()->user()->id
        ];
        
        // if($request->action){
        //     $insertData["bookmark"] = true;            
        // } else {
        //     $insertData["bookmark"] = false; 
        // }

        $kondisi = bookmark::where('post_id', $request->post_id)->where('user_id', auth()->user()->id)->first();

        if(isset($kondisi)){
            bookmark::where('post_id', $request->post_id)->where('user_id', auth()->user()->id)->delete();
            // $myReturn["message"] = false; 
        } else {
            // $myReturn["message"] = true; 
            bookmark::create($insertData); 
        }
        
        return $insertData;
        // [
        //     "status" => 200,
        //     "message" => "postingan berhasil di upoload",
        //     "data" => $insertData
        // ];

    }

    public function likeAct(request $request){
        $insertData = [
            "post_id"  => $request->post_id,
            "user_id"  => auth()->user()->id
        ];

        $myReturn = [
            "status" => 200,
            "data" => $insertData
        ];
        
        $kondisi = like::where('post_id', $request->post_id)->where('user_id', auth()->user()->id)->first();

        if(isset($kondisi)){
            like::where('post_id', $request->post_id)->where('user_id', auth()->user()->id)->delete();
            // $myReturn["message"] = false; 
        } else {
            // $myReturn["message"] = true; 
            like::create($insertData); 
        }
        
        return $myReturn;

    }

    public function getFolls(){
        // return follows::where("user_id", auth()->user()->id)->count();
        return response()->json([
            "following" => follows::where("user_id", auth()->user()->id)->count(),
            "followers" => follows::where("following_user_id", auth()->user()->id)->count()
        ]);
    }

    public function followAct(Request $request){        
        

        $decision = follows::where('user_id', auth()->user()->id)->where('following_user_id', $request->id)->exists();

        $res =[
            "status" => 200
        ];

        if($decision){
            follows::where('user_id', auth()->user()->id)->where('following_user_id', $request->id)->delete(); 
            $res["message"] = false;
        }else{
            follows::create(['user_id' => auth()->user()->id, 'following_user_id' => $request->id]);
            $res["message"] = true;
        }

        return response()->json($res);
    }
}
