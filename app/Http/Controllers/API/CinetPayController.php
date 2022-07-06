<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CinetPayController extends Controller
{
    public function notify(Request $request)
    {
        $data = $request->all();
        Log::log('CinetPay notification: '.json_encode($data));
        dd($request);
        return response()->json(['status' => 'success']);
    }

}
