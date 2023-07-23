<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'size']);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function discount() {
        return $this->belongsTo(DiscountCode::class, 'discount_code_id');
    }
}
