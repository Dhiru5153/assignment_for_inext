<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('dashboard', compact('users'));
    }

    public function edit(User $user)
    {
        // dd($user);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|digits:10',
        ]);

        $user->update($request->only('first_name', 'last_name', 'email', 'phone'));

        return redirect()->route('dashboard')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
    }
}
