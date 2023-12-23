<?php

namespace App\Models;

use App\Models\User;
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
    // public function employes(): HasMany
    // {
    //     return $this->hasMany(User::class);
    // }
}