<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batiment extends Model
{
    use HasFactory;

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function equipement(): HasMany
    {
        return $this->hasMany(Equipement::class);
    }

}
