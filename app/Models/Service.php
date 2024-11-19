<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    public function cabins() : BelongsToMany
    {
        return $this->belongsToMany(Cabin::class, 'cabin_service', 'service_id', 'cabin_id');
    }

    protected $fillable = [
        'name',
    ];
}
