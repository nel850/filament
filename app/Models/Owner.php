<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

class Owner extends Model
{
    use HasFactory;
    
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
}
