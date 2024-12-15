<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller {
    public function showRegisterForm() {
        $role = Role::where('id_role', 1)->first();
        return view('auth.register', compact('role'));
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->id_role = $request->id_role; // Role dosen
        $user->save();

        Auth::login($user);

        return redirect()->route('/')->with('success', 'Registrasi berhasil.');
    }

    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('/');
        }

        return redirect()->back()->withErrors(['error' => 'Invalid email or password.'])->withInput();
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}