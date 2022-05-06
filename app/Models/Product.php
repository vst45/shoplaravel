<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Traits\Filterable;

class Product extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'products';

    protected $appends = ['actual_price'];

    function getActualPriceAttribute()
    {
        return floor($this->price * (100 - $this->sale_percent)/100);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

}
