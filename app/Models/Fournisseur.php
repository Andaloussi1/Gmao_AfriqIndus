<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable=['nom','tel','email','tauxTVA','code','remarque','adresse','telSec','numTVA','active'];

    public function article(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function bonCommande(): HasMany
    {
        return $this->hasMany(BonCommande::class);
    }

}
