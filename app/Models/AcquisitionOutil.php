<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcquisitionOutil extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'prix', 'louer', 'periode', 'periodicite', 'quantite', 'outil_id', 'fournisseur_id'];

    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(Fournisseur::class);

    }

    public function outil(): BelongsTo
    {
        return $this->belongsTo(Outil::class);

    }

}
