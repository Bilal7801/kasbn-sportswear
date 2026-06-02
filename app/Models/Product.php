<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Ensure 'keywords' is listed here!
    protected $fillable = [
        'name', 
        'description', 
        'keywords', // <-- CRITICAL LINE
        'category_id', 
        'price', 
        'bulk_price', 
        'stock', 
        'status',
        'slug'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }
}