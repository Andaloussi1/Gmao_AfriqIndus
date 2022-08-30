<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutilStock extends Model
{
    use HasFactory;
    protected $fillable= ['reference','nom','marque','type','stock'];
}
