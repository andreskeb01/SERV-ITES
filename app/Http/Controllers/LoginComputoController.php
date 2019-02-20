<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginComputoController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function showLoginComputoForm()
    {
        return view( 'auth.logincc');
    }

    public function autenticar(Request $request)
    {
       $credentials = $this->validate($request, [
           'email' => 'email|required|string',
           'password' =>'required|string'
       ]);

       if(Auth::attempt($credentials)){

               return redirect()->route('centrocomputo' );

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
