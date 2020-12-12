<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth')->only('logout');
    }

    public function showLogin()
    {
    	return view('auth.login');
    }

    public function login(Request $request)
    {
    	$result = $request->validate([
    		'username' => 'required',
    		'password' => 'required'
    	]);

    	if (auth()->attempt($result)) {
    		return redirect()->route('pemasukan.index');
    	}

    	return back()->withstatus('Username atau Password Salah!');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
