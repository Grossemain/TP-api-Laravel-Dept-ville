<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departement;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = [
        'insee_code',
        'departement_code',
        'zip_code',
        'name',
        'slug',
        'gps_lat',
        'gps_lng'
    ];

    public function ville()
    {
        return $this->belongsTo(Departement::class);
    }
}
