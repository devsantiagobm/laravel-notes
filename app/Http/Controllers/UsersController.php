<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Http\Requests\LogInRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller {
    function register(SignUpRequest $request) {
        User::create($request->validated());

        $user = Auth::getProvider()->retrieveByCredentials($request->validated()); // Recuperar el usuario que acaba de registrarse
        Auth::login($user); // Iniciar sesión con el usuario que se recuperó

        return redirect()->route("home")->with("success", "Usuario creado exitosamente");
    }

    function logIn(LogInRequest $request) {
        $credentials = $request->getCredentials();

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(["user-not-found" => "Usuario no encontrado"]);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return redirect()->route("home")->with("success", "Inicio realizado correctamente");
    }

    function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("login-form");
    }
}
