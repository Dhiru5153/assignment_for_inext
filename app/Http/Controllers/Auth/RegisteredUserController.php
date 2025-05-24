<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);
        
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(route('dashboard', absolute: false));
    // }
    public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name'  => ['required', 'string', 'max:255'],
        'dob'        => ['required', 'date', 'before_or_equal:today'],
        'address'    => ['required', 'string', 'max:255'],
        'phone'      => ['required', 'digits:10'],
        'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).+$/',],
        'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // max size in KB (2MB)
    ]);

    $photoPath = null;

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
    }


    $user = User::create([
        'first_name' => $validated['first_name'],
        'last_name'  => $validated['last_name'],
        'dob'        => $validated['dob'],
        'address'    => $validated['address'],
        'phone'      => $validated['phone'],
        'email'      => $validated['email'],
        'password'   => Hash::make($validated['password']),
        'photo' => $photoPath,
    ]);

    Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    // return redirect(RouteServiceProvider::HOME);
}
}
