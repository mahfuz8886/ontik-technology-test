<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function subcategory() {
        return $this->belongsTo(Subcategory::class)->with('category');
    }

    public function category() {
        return $this->hasOneThrough(Category::class, Subcategory::class);
    }
}
