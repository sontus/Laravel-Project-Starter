<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
