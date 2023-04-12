<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teams extends Model
{
    use HasFactory;

    public function players(): HasMany
    {
        return $this->hasMany(Players::class, 'player_team', 'id');
    }
}
