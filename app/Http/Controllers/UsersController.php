<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::whereEmail($request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect(route('category.index'));
            }
        } else {
            return redirect(route('viewLogin'))->with('msg', 'Usuario y/o Contraseña Incorrecta');
        }
    }

    public function viewLogin()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
