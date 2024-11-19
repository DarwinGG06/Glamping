<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cabin extends Model
{
    use HasFactory;

    public function cabin_levels(): BelongsTo
    {
        return $this->belongsTo(CabinLevel::class, 'cabillevel_id');
    }

    protected $fillable = [
        'name',
        'cabinlevel_id',
        'capacity',
    ];
}
