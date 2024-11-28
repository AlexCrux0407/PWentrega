<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    // Mostrar formulario de inicio de sesión
    public function login()
    {
        return view('auth.login'); // Asegúrate de tener esta vista
    }
    public function register()
    {
        return view('auth.registro');
    }

    // Procesar inicio de sesión
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->rol === 'administrador') {
                return redirect()->route('admin.dashboard')->with('success', 'Bienvenido, Administrador.');
            }

            return redirect()->route('inicio')->with('success', 'Inicio de sesión exitoso.');
        }

        return back()->withErrors(['error' => 'Credenciales incorrectas, inténtalo nuevamente.']);
    }

    public function processRegister(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'usuario' => 'required|string|max:255|unique:users',
            'contraseña' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->nombre, 
            'email' => $request->email,
            'usuario' => $request->usuario,
            'password' => Hash::make($request->contraseña), 
            'rol' => 'usuario',
        ]);

        return redirect()->route('login')->with('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
    }



}
