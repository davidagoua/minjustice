<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->id()){
            return redirect('/compte');
        }
        return view('front.index');
    }

    public function documents(Request $request)
    {
        return view('front.documents');
    }
}
