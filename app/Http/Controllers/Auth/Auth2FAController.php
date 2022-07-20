<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserCode;
use Illuminate\Http\Request;

class Auth2FAController extends Controller
{

    /**
     * index method for 2fa
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.two_factor_verify');
    }

    /**
     * validate sms
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
        ]);

        $exists = UserCode::where('user_id', auth()->user()->id)
            ->where('code', $validated['code'])
            ->where('updated_at', '>=', now()->subMinutes(5))
            ->exists();

        if ($exists) {
            \Session::put('tfa', auth()->user()->id);

            return redirect()->route('home');
        }

        return redirect()
            ->back()
            ->with('error', 'Vous avez entré un mauvais code OTP.');
    }
    /**
     * resend otp code
     *
     * @return response()
     */
    public function resend()
    {
        auth()->user()->generateCode();

        return back()
            ->with('success', 'Nous avons renvoyé le code.');
    }

}
