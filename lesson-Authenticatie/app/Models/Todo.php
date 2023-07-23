<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeUncompleted($query) {
        return $query->where('completed', false);
    }

    public function scopeCompleted($query) {
        return $query->where('completed', true);
    }
}
