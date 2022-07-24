<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;
    public function batiment(): BelongsTo
    {
        return $this->belongsTo(Batiment::class);
    }

    public function sousEquipement(): HasMany
    {
        return $this->hasMany(SousEquipement::class);
    }
}
