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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nik' => ['nullable', 'string', 'max:16', 'unique:' . User::class],
            'born_place' => ['nullable', 'string', 'max:255'],
            'born_date' => ['nullable', 'date'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:15'],
            'gender' => ['nullable', 'string', 'max:1'],
            'relationship_name' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'born_place' => $request->born_place,
            'born_date' => $request->born_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'relationship_name' => $request->relationship_name,
        ]);

        $user->assignRole('admin');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
