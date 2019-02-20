<?php

namespace App\Http\Controllers\Auth;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function autenticar(Request $request)
    {

       $credentials = $this->validate($request, [
           'email' => 'email|required|string',
           'password' =>'required|string'
       ]);


       if(Auth::attempt($credentials)){

           return redirect()->route('biblioteca' );

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
