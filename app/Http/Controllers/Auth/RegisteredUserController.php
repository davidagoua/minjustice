<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserRegistered;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.lregister');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'lieu_naissance' => ['required', 'string'],
            'date_naissance' => ['required', 'date'],
            'telephone' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'situation_matrimonial' => ['required'],
        ]);

        $user = new User($request->only([
            'first_name','last_name','lieu_naissance','date_naissance',
            'email','sexe', 'situation_matrimonial'
        ]));
        $user->password = Hash::make('password');
        $user->register_step = 2;

        $user->save();
        $user->notify(new UserRegistered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
