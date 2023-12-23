<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commandes extends Model
{
    use HasFactory;

    protected $guarded=[''];


    public function produit(){
        return
        $this->belongsToMany(Produit::class, 'Pivot')->withPivot('quantite','total');
    }
}
