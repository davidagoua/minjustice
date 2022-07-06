<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class SendSMS
{
    use AsAction;

    public function handle($contact='2250565331668', $text="Bou")
    {
        $res = Http::get('https://smspro.mtn.ci/bms/Soap/Messenger.asmx/HTTP_SendSms',[
            'username'=>"AGOUA",
            "userPassword"=>"Password001",
            "originator"=>"MSHP-CMU",
            "type"=>"text",
            "smsText"=>$text,
            'recipientPhone'=> $contact,
            'messageType'=> 'latin',
            'customerID'=>'4672',
            'private'=>'false',
            'flash'=>'false',
            'blink'=>'false'
        ]);
        return $res;
    }
}
