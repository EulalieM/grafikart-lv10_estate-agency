<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            // session()->regenerate();
            $request->session()->regenerate();

            // return redirect()->route('blog.index');
            return redirect()->intended(route('blog.index')); // redirige vers la route que l'utilisateur demandait à l'origine, et s'il n'y en avait pas alors vers la route blog
        };

        return to_route('auth.login')->withErrors([
            'email' => "Email invalide"
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }
}
