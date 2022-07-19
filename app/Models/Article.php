<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;
    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(Fournisseur::class);

    }

    public function intervention(): BelongsToMany
    {
        return $this->belongsToMany(Intervention::class);

    }

    public function Cmd(): BelongsToMany
    {
        return $this->belongsToMany(Cmd::class);

    }
}
