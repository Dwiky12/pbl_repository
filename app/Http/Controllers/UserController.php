<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index() {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'id_role' => 'required|exists:roles,id_role',
        ]);

        User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'id_role' => $validated['id_role'],
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function show($id_user) {
        $user = User::findOrFail($id_user);
        return view('user.show', compact('user'));
    }

    public function edit($id_user) {
        $user = User::findOrFail($id_user);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id_user,
            'password' => 'nullable|string|min:8|confirmed',
            'id_role' => 'required|exists:roles,id_role',
        ]);

        $user = User::findOrFail($id_user);
        $user->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => $request->filled('password') ? bcrypt($validated['password']) : $user->password,
            'id_role' => $validated['id_role'],
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id_user) {
        $user = User::findOrFail($id_user);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}