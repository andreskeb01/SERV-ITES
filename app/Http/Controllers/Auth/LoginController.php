<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view( 'auth.login');
    }

    public function autenticar()
    {
       $credentials = $this->validate(request(), [
           'email' => 'email|required|string',
           'password' =>'required|string'
       ]);


       if( Auth::attempt($credentials)){
           return redirect()->route('dashboard');
       } else return back()
           ->withErrors(['usuario_invalido'=>'fallo la autenticacion'])
           ->withInput(request(['email']));
    }

    public function cerrarSesion()
    {
        Auth::logout();
        return redirect('/');
    }


}
