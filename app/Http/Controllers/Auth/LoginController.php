<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use function Symfony\Component\HttpKernel\Tests\Controller\controller_function;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function showLoginForm($option)
    {
        if($option == 1){
            return view( 'auth.login');
        }
        else return view( 'auth.logincc');
    }

    public function autenticar()
    {
       $credentials = $this->validate(request(), [
           'email' => 'email|required|string',
           'password' =>'required|string'
       ]);


       if( Auth::attempt($credentials)){
           $user =
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
