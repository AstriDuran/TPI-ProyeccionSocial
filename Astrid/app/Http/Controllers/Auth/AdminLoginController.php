<?php

namespace App\Http\Controllers\Auth; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      // Validar los datos del formulario
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Intentar iniciar sesión en el usuario
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // si tiene éxito, entonces redirija a su ubicación deseada
        return redirect()->intended(route('admin.bienvenido'));
      }

      // si no tiene éxito, redirigir de nuevo al inicio de sesión con los datos del formulario
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login'); 
    }
}
