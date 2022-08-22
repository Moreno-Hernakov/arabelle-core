<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
// use auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        $validasi = $request->validate([
            'username' => 'required',
            'password' => ''
        ]);
        

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout() 
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');

        // return 'halllo world';
    }

    // ==============================================================================================

    public function vuejs()
    {
        return view('login.vuejs');
    }

    public function tampil(request $request)
    {
      
        $insertdata = [
            "username" => request()->unm ,
            "password" => request()->pw
        ];

        if (!Auth::attempt($insertdata)) {
            return [
                "status" => 401,
                "message" =>  "login Gagal!!!"
            ];
        }  

        $user = User::where('username', request()->unm)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
        ->json([
            'message' => 'Hi '.$user->username.', welcome to home',
            'access_token' => $token, 
            'token_type' => 'Bearer',
            "status" => 200,
            "role" => $user->role
        ]);
    }

    public function vueLogout(){
        
    }
}

