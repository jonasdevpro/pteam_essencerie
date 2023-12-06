<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuve extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];

    public function gerant()
    {
        return $this->belongsTo(User::class, 'gerant_id');
    }

    static public function fuelTanks()
    {
        return Cuve::where('active', true)
            ->where('contenu', 'essence')
            ->orderBy('created_at', 'desc')->get();
    }

    static public function dieselTanks()
    {
        return Cuve::where('active', true)
            ->where('contenu', 'diesel')->orderBy('created_at', 'desc')->get();
    }
}
