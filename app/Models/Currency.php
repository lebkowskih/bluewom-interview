<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency',
        'code',
        'mid',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_favorite_currencies');
    }
}
