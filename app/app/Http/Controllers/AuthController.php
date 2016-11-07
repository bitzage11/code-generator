<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class AuthController extends Controller
{
 	public function index()
 	{
 		return view('admin.register');
 	}
 	public function login()
 	{
 		return view('admin.login');
 	}

 	public function admin_login(Request $request)
    {
        
        if (Auth::attempt(['email' => $request->user_email, 'password' => $request->user_password])){
            
            return redirect('admin/dashboard');
           
        }else{

            return redirect()->back()->with('error', 'Invalid credentials please verify before login')->withInput();
        }
    }

    public function authLogout(){

        Auth::logout();

        return redirect('/');
    }

}
