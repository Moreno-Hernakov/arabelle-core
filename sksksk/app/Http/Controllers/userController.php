<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\follows;
// use App\Models\myModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class userController extends Controller
{
    public function authh(){
        return User::where('email', auth()->user()->email)->with('myModel.comment.User',  'myModel.User', 'myModel.like')->get();
        // return auth()->user()->with('myModel');
    }

    public function getAllUser(){
        return User::where('id', '!=', auth()->user()->id)->with('myModel.comment.User',  'myModel.User', 'myModel.like')->get();
    }

    public function updateUser(request $request){
        
        // $data = $request->all();
        // $data['photo'] = $request->file('photo');
        // return $request->file('photo')->store('profile-images');


        $insertData = [   
            "username" => $request->username,  
            "email" => $request->email,
            "id" => $request->idS
        ];

        // if($request->file('photo')){
        //     $insertData["images"] = $request->profile->file('photo')->store('profile-images');
        // }

        return $insertData;
        // return User::where('email', auth()->user()->email)->with('myModel.comment')->get();
        
        // User::where('id', $request->id)->update($insertData);

        // return [
        //     "message" => "Profile berhasil diperbarui",
        //     "status" => 200
        // ]; 
    }

    public function updateUserImg(request $request){
        // if($request->file('photo')){
        //     $insertData["images"] = $request->profile->file('photo')->store('profile-images');
        // }

        

        $insertImg = [
            "images" => $request->file('photo')->store('profile-images')
        ];

        User::where('id', auth()->user()->id)->update($insertImg);

        return [
            "data" => $insertImg,
            "status" => 200,
            "message" => "Profile Berhasil Diperbarui"
        ];

    }
}
