<?php

namespace App\Models;

use App\Models\Commandes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory, HasUuids;

    protected $guarded=[''];


    public function commande(){
        return
        $this->belongsToMany(Commandes::class, 'Pivot')->withPivot('quantite','total');
    }
}
