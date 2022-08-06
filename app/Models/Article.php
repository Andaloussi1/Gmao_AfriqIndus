<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Article extends Model
{
    use HasFactory;
    protected $fillable = ['nom','reference','marque','prixAchat','prixVente','total','totalHTVA','emplacement','type','unite','designation','stockMin','stockInit','niveauStock', 'fournisseur_id'];
    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(Fournisseur::class);

    }

    public function interventions(): BelongsToMany
    {
        return $this->belongsToMany(Intervention::class);

    }

    public function commandes(): BelongsToMany
    {
        return $this->belongsToMany(Commande::class);

    }
}
