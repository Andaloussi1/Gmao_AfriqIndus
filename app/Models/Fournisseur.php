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

    public function acquisitionOutil(): HasMany
    {
        return $this->hasMany(AcquisitionOutil::class);
    }

    public function bonCommande(): HasMany
    {
        return $this->hasMany(BonCommande::class);
    }

}
