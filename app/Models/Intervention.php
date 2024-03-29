<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;
    protected $fillable =['titre','type','desc','status','dateDb','dateFin','totalHTVA','emplacement','type','unite'];
    public function article(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
    public function site(): BelongsTo
    {
        return $this->BelongsTo(Site::class);
    }
}
