<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Login;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    
    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = Login::where('username', $credentials['username'])->first();

        if (!$user || $user->password !== $credentials['password']) {
            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ]);
        }
    
        // Jika login berhasil
        return redirect()->route('products.index');
    }
}
