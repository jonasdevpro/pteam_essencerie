<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_station',
        'image_logo',
        'image_fond',
        'gerant_id'
    ];

    public function gerant()
    {
        return $this->belongsTo(User::class);
    }
    // public function gerant()
    // {
    //     return $this->belongsTo(User::class, 'user_id')->where('role', 'gerant');
    // }
}