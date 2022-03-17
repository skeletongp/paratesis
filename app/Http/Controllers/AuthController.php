<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{

    public function access()
    {
        return view('auth.access');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect()->route('auth.access')->with(['errors'=>['message'=>'Datos incorrectos']]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended(route('welcome'));
    }

    public function createPassword(Request $request)
    {
        $userExists=User::where('email', $request->email)->first();
        if ($userExists) {
            Auth::login($userExists);
            return redirect()->intended(route('dashboard'));
        }
        $fields = $request->all();
        return view('auth.create-password', get_defined_vars());
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();
        $fields = [
            'name' => $user->getName(),
            'avatar' => $user->getAvatar(),
            'email' => $user->getEmail(),
            'email_verified_at' => now(),
        ];

        return redirect()->route('auth.createPassword', $fields);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'avatar' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);
        
        $request->merge(['uid' => Uuid::uuid4()]);
        $pwd = $request->password;
        $request->merge(['password' => Hash::make($request->password)]);

        $user =  User::create($request->all());

        $credentials = [
            'email' => $request->email,
            'password' => $pwd,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect()->route('auth.access');
        }
    }
}
