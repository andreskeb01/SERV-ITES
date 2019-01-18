<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

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
           $user = Auth::user();
           $id_rol_usuario = DB::table('role_user')->where([['user_id', '=', $user->id]])->first();
           //Roles id
           //role_id : 1 =  SuperAdmin
           //role_id : 2 =  EncargadoBiblioteca
           //role_id : 3 =  Alumno
           //role_id : 4 =  EncargadoCC
           //role_id : 5 =  Docente
           if($id_rol_usuario == '2' || $id_rol_usuario == '3')
           {
               return redirect()->route('biblioteca' );
           }elseif ($id_rol_usuario == '4' || $id_rol_usuario == '5')
           {
               return redirect()->route('centrocomputo' );
           }
            //Ver posibilidad de redirigir al super admin a un menu para las 3 vistas con otro elseif(users, biblioteca cc)

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
