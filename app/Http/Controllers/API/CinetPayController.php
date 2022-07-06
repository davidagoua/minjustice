<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Livewire;

class CinetPayController extends Controller
{
    public function notify(Request $request)
    {
        $data = $request->validate([
            'cpm_trans_id'=>'required'
        ]);
        $paiement = Paiement::where('reference', $data['cpm_trans_id'])->first();
        return response()->json(['status' => 'success']);
    }

}
