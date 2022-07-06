<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = auth()->user();
        $view_name = 'profile.edit';

        if($request->filled('step')){
            $step = $request->input('step');
            switch ((int) $step){
                case "1":
                    $view_name = 'profile.edit';
                    break;
                case "2":
                    $view_name = 'profile.edit_2';
                    break;
                default:
                    $view_name = 'profile.edit';
                    break;
            }
        }
        return view($view_name, compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $data = [];
        if($request->filled('step')){
            $step = $request->input('step');
            switch ($step){
                case 1:
                    $data = $request->validate([
                        'first_name' => ['required', 'string'],
                        'last_name' => ['required', 'string'],
                        'lieu_naissance' => ['required', 'string'],
                        'date_naissance' => ['required', 'date'],
                        'telephone' => ['required', 'numeric'],
                        'email' => ['required', 'string', 'email', 'max:255'],
                        'password' => ['required', 'confirmed'],
                        'situation_matrimonial' => ['required'],
                    ]);
                default:
                    $data = $request->validate([
                        'date_naissance_pere'=>'required',
                        'date_naissance_mere'=>'required',
                        'lieu_naissance_pere'=>'required',
                        'lieu_naissance_mere'=>'required',
                    ]);
            }
        }


        $user->fill($data)->save();
        return back()->with('success', "Profile modifié");
    }


}
