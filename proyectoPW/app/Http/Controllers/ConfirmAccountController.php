<?php

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
