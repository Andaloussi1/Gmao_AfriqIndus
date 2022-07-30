<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['nom','reference','marque','prixAchat','prixVente','total','totalHTVA','emplacement','type','unite','designation','stockMin','stockInit','niveauStock', 'fournisseur_id'];
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
    public function document():MorphMany{
        return $this->morphMany(Document::class,'model');
    }
}
