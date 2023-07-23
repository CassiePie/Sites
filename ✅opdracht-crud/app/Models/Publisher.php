<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publisher extends Model
{
    protected $fillable = ['name'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
