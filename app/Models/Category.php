<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'photo'];

    // Many to Many relationship with Product
    public function products(){
        return $this->belongsToMany(Product::class);
    }

}
