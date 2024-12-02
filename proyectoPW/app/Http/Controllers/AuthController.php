<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\ConfirmAccount;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Mostrar formulario de inicio de sesión
    public function login()
    {
        return view('auth.login');
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

        if (Auth::attempt(['usuario' => $credentials['usuario'], 'password' => $credentials['password']], $request->filled('recordar'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->rol === 'administrador') {
                return redirect()->route('admin.dashboard')->with('success', 'Bienvenido, Administrador.');
            }

            return redirect()->route('inicio')->with('success', 'Inicio de sesión exitoso.');
        }

        return back()->withErrors(['error' => 'Credenciales incorrectas, inténtalo nuevamente.']);
    }

    // Procesar registro de usuario
    public function processRegister(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'usuario' => 'required|string|max:255|unique:users',
        'contraseña' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $request->nombre,
        'email' => $request->email,
        'usuario' => $request->usuario,
        'password' => Hash::make($request->contraseña),
        'rol' => 'usuario',
        'confirmation_token' => Str::random(60),
    ]);

    $user->notify(new ConfirmAccount($user));

    return redirect()->route('login')->with('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
}



    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'confirmation_token' => Str::random(60),
        ]);

        $user->notify(new ConfirmAccount($user));

        return $user;
    }
}

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ConfirmAccountController extends Controller
{
    public function confirm($token)
    {
        $user = User::where('confirmation_token', $token)->firstOrFail();
        $user->confirmation_token = null;
        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('status', 'Cuenta confirmada. Ahora puedes iniciar sesión.');
    }
}
