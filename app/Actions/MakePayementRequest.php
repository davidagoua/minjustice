<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class MakePayementRequest
{
    use AsAction;

    private const BASE_URL = 'https://api-checkout.cinetpay.com/v2/payment';

    public function handle($reference, $amount, $description, $notify_url, $return_url, $channels, $contact_debit)
    {
        $response = Http::post(self::BASE_URL, [
            'site_id' => config('cinetpay.site_id'),
            'apiKey' => (string) config('cinetpay.apiKey'),
            'amount' => $amount,
            'currency' => 'XOF',
            'lang' => 'fr',
            'transaction_id' => $reference,
            'description' => $description,
            'notify_url' => $notify_url,
            'return_url' => $return_url,
            'channels' => $channels,
        ]);



        return $response->json();
    }

}
