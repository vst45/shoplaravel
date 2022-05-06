<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function categories()
    {
        return $this->hasMany(Category::class)->orderBy('order', 'asc');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories')->orderBy('order', 'asc');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function parentCategories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->with('parentCategory');
    }
}
