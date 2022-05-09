<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Brand extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $table = 'brands';

    protected $fillable = [
        'title'
    ];

    protected $allowedSorts = [
        'id', 'title'
    ];

    protected $allowedFilters = [
        'title'
    ];

}
