<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['nom','reference','marque','prixAchat','prixVente','emplacement','type','unite','designation','stockMin','niveauStock', 'fournisseur_id'];
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

    public function media():MorphMany {
        return $this->morphMany(Media::class, 'model');
    }

}
