<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [''];

    /**
     * Get all of the comments for the Vente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    
    public function pompiste()
    {
        return $this->belongsTo(User::class, 'pompiste_id');
    }
    public function chef_piste()
    {
        return $this->belongsTo(User::class, 'chef_piste_id');
    }
    
}