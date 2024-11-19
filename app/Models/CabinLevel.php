<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CabinLevel extends Model
{
    use HasFactory;

    public function cabins(): HasMany
    {
        return $this->hasMany(Cabin::class, 'cabinlevel_id');
    }

    protected $fillable = [
        'name',
        'description',
        'color',
    ];
}
