<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'category_id';

    public function subCategory(){
        return $this->hasMany(Category::class, 'cat_id');
    }
    
    public function products(){
        return $this->hasMany(Product::class, 'cat_id');
    }
}