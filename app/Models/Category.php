<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'icon', 'image', 'status', 'parent_id'];

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products() {
        // If the Product model doesn't exist yet, this will only 
        // error if you actually try to fetch products.
        return $this->hasMany(Product::class);
    }
}