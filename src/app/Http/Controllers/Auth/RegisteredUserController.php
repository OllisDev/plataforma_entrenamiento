<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Ciclista;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        // mapear nombres del formulario a los del modelo
        $data = $request->validate([
            'name' => ['required', 'string', 'max:80'],
            'lastName' => ['required', 'string', 'max:80'],
            'birthday' => ['required', 'date'],
            'email' => ['required', 'email', 'max:80', 'unique:ciclista,email'],
            'password' => ['required', 'string', 'max:60', 'confirmed'],
        ]);

        // renombrar campos para el modelo
        $ciclistaData = [
            'nombre' => $data['name'],
            'apellidos' => $data['lastName'],
            'fecha_nacimiento' => $data['birthday'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ];

        $ciclista = Ciclista::create($ciclistaData);

        $ciclista->api_token = Str::random(60);
        $ciclista->save();

        return redirect(route('login'));
    }
}
