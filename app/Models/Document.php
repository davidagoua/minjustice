<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class DocumentStatus {
    public const VALIDE = 1;
    public const EXP = 1;
}

class Document extends Model
{
    use HasFactory, HasStatuses;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(TypeDocument::class, 'type_document_id');
    }

    public function getIsValideAttribute()
    {
        return now()->diffInMonths($this->created_at) < 3;
    }

    public function valideScope($query)
    {
        return $query->whereDate('created_at' );
    }
}
