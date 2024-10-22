<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notebook extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}


