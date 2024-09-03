<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request) {
        return view('profile', ['user' => Auth::user()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];

        if(!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile berhasil di update.');
    }

    public function delete(Request $request) {
        $user = User::findOrFail(Auth::user()->id);
        $user->delete();
        return redirect()->route('index')->with('success', 'Akun berhasil di hapus.');
    }
}
