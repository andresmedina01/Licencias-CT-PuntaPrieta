<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create($request->validated());

            return redirect('login')->with('success', '¡USUARIO REGISTRADO EXITOSAMENTE!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Error al registrar el usuario: ' . $e->getMessage());
        }
    }
}
