<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousEquipement extends Model
{
    use HasFactory;

    public function Equipement(): belongsTo
    {
        return $this->belongsTo(Equipement::class);
    }

}
