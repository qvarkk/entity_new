<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authenticate(LoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data))
        {
            $request->session()->regenerate();
            return redirect()->route('main.index');
        }

        return back()->withErrors([
            'error' => 'No account with this credentials found'
        ])->onlyInput('email');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('main.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('main.index');
    }
}
