<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'subtitle',
        'regular_price',
        'sale_price',
        'stock',
        'rating',
        'short_desc',
        'long_desc',
        'brand_id'
    ];

    // Relationships with gallery model

    public function gallery(){
        return $this->hasMany(Gallery::class);
    }

    // Relationships with brand model

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    // Many to Many relationship with Category
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    // Many to Many relationship with Tag
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
