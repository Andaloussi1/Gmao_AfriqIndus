<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonCommande extends Model
{
    use HasFactory;
    public function fournisseur(): belongsTo
    {
        return $this->belongsTo(Fournisseur::class);
    }
}
