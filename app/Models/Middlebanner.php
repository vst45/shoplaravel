<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Middlebanner extends Model
{
    use HasFactory;
    protected $table = 'middlebanners';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function url()
    {
        return route('siteCatalog', ['category' => $this->category->slug]);
    }
}
