<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Payment extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $table = 'payments';

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
