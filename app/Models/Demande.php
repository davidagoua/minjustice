<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class DemandeStatus {
    public  const VALIDATION = 1;
    public  const TRAITEMENT = 2;
    public  const ECHEC = 3;
    public  const TERMINE = 4;
}


class Demande extends Model
{
    use HasFactory, HasStatuses;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paiement()
    {
        return $this->hasOne(Paiement::class);
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }

    public function type_document()
    {
        return $this->belongsTo(TypeDocument::class, 'type_document_id');
    }

    public function juridiction()
    {
        return $this->belongsTo(Juridiction::class, 'juridiction_id');
    }
}
