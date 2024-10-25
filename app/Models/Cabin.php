<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cabin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cabinlevel_id',
        'capacity',
    ];

    public function cabinlevel(): BelongsTo{
        return $this->belongsTo(Cabinlevel::class);
    }
}
