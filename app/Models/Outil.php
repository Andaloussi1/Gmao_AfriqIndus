<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outil extends Model
{
    use HasFactory;

    protected $fillable = ['nom','reference','marque','type','stock','stockLoue'];

    public function acquisitionOutil(): HasMany
    {
        return $this->hasMany(AcquisitionOutil::class);
    }

}
