<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bigbanner extends Model
{
    use HasFactory;
    protected $table = 'bigbanners';

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function url() {
        return route('siteCatalog', ['category' => $this->category->slug]);
    }
}
