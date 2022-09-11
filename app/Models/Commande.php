<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Commande extends Model
{
    use HasFactory;

    protected $fillable=['titre','description','adresseLivraison','dateCommande','dateLivraison','status','total','totalHTVA','articles'];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class)
                ->withPivot(['quantite']);
    }
}
