<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect('');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('rpe', 'password');

        if (!Auth::attempt($credentials)) {
            Log::warning('Inicio de sesión fallido con el correo: ' . $request->rpe);
            return redirect()->route('login')->withErrors(['error' => 'Las credenciales proporcionadas son incorrectas.']);
        }

        // Crear la sesión
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        Log::info('Se ha iniciado sesión con el correo: ' . $request->rpe);

        return $this->authenticated();
    }

    public function authenticated()
    {
        return redirect('')->with('success', '¡Se ha iniciado la sesion correctamente!');
    }
}
