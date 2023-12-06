<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pompe extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];

    public function fuelTank(){
        return $this->belongsTo(Cuve::class, 'cuve_id_essence');
    }

    public function dieselTank(){
        return $this->belongsTo(Cuve::class, 'cuve_id_diesel');
    }

    public function gerant(){
        return $this->belongsTo(User::class, 'user_id');
    }

    static public function AllPompes(){
        return Pompe::whereNot('active', 0)->orderBy('created_at', 'desc');
    }
}
