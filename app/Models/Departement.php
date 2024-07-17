<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ville;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'code',
        'name',
    ];

    public function Departement()
    {
        return $this->hasMany(Ville::class);
    }
}
