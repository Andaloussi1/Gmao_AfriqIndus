<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['nom','reference','marque','prixAchat','prixVente','total','totalHTVA','emplacement','type','unite','designation','stockMin','stockInit','niveauStock'];
    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(Fournisseur::class);

    }

    public function intervention(): BelongsToMany
    {
        return $this->belongsToMany(Intervention::class);

    }

    public function commande(): BelongsToMany
    {
        return $this->belongsToMany(Commande::class);

    }
}
