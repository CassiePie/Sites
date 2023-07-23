<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'completed', 'publisher_id'];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

}
