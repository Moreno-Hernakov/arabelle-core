<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisController extends Controller
{
    public function index() 
    {
        return view('login.regis');
        // return 'hallo';
    }

    public function tampil(request $request) 
    {
        
        $insertdata = [
            "username" => $request->username ,
            "email" => $request->email ,
            "password" => Hash::make($request->password2)
        ];

        User::create($insertdata);

        return redirect('/login')->with('success', 'akun berhasil dibuat');
    }

    // ===========================================================================================

    public function insertUser(request $request) 
    {
        $data = $request->isinya;
        // $insertdata = [
        //     "username" => $data["unm"] ,
        //     "email" => $data["email"] ,
        //     "password" => Hash::make($data["pw"])
        // ];

        $User = User::create([
            "username" => $data["unm"] ,
            "email" => $data["email"] ,
            "password" => Hash::make($data["pw"])
        ]);
        
        $token = $User->createToken('auth_token')->plainTextToken;

        return response()
            ->json([
                'data' => $User,
                'access_token' => $token, 
                'token_type' => 'Bearer', 
                "status" => 200,
                "message" => "User Berhasil Ditambahkan"
            ]);
    

        


    }
}
