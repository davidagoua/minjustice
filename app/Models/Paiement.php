<?php

namespace App\Models;

use App\Actions\MakePayementRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Boolean;
use Spatie\ModelStatus\HasStatuses;

class Paiement extends Model
{
    use HasFactory, HasStatuses;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function demande()
    {
        return $this->hasOne(Demande::class, 'paiement_id');
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }

    public function makeRequest()
    {
        return MakePayementRequest::run(...[
            'reference' => $this->reference,
            'amount'=> $this->montant,
            'contact_debit' => $this->contact,
            'notify_url' => route('cinetpay.notify'),
            'return_url' => url()->current(),
            'channels' => 'MOBILE_MONEY',
            'description' => 'Paiement de la demande ',
        ]);
    }

    public function isActif() : bool
    {
        return (new Carbon($this->updated_at))->addDays(15) <= now();
    }
}
