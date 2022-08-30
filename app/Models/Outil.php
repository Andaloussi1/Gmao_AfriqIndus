<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//fillables
class Outil extends Model
{
    use HasFactory;
    protected $fillable=['reference','prix','louer','periode','quantite','periodicite','date','fournisseur_id'];
}
