<?php

namespace App\Models;

use App\Models\Vente;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VentesProduit extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relation avec le modèle Produit
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    // Relation avec le modèle Vente
    public function vente()
    {
        return $this->belongsTo(Vente::class, 'vente_id');
    }

    
}