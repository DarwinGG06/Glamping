<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cabin extends Model
{
    use HasFactory;

    public function cabin_level(): BelongsTo
    {
        return $this->belongsTo(CabinLevel::class, 'cabinLevel_id');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'cabin_service', 'cabin_id', 'service_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'cabin_user', 'cabin_id', 'user_id');
    }

    protected $fillable = [
        'name',
        'cabinlevel_id',
        'capacity',
    ];
}
