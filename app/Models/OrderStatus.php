<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class OrderStatus extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $table = 'order_statuses';

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
