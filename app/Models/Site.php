<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    public function intervention(): HasMany
    {
        return $this->HasMany(Intervention::class);
    }

    public function batiment(): HasMany
    {
        return $this->hasMany(Batiment::class);
    }
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

}
