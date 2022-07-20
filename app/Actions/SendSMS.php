<?php

namespace App\Actions;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class SendSMS
{
    use AsAction;



    public function handle($contact='2250787837592', $text="Bou")
    {

        $res = Http::get('https://smspro.mtn.ci/bms/Soap/Messenger.asmx/HTTP_SendSms',[
            'username'=>"AGOUA",
            "userPassword"=>"Password001",
            "originator"=>"MSHP-CMU",
            "smsText"=>$text,
            'recipientPhone'=> $contact,
            'messageType'=> 'Latin',
            'customerID'=>'4672',
            'private'=>'false',
            'flash'=>'false',
            'defdate'=> "",
            'blink'=>'false',
        ])->header('accept: */*');
        return $res;

    }
}
