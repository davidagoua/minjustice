<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function type_demande()
    {
        return $this->belongsTo(TypeDemande::class);
    }

    public function getDocsAttribute() : array
    {
        $list =  array_map(function($str){ return trim($str);},explode('|', $this->required_fields)) ;
        return array_filter($list, function($str){
            return $str != '';
        });
    }
}
