<?php

use App\Models\Category;
use App\Models\Product;

if (!function_exists('seconds_to_hours')) {
    function seconds_to_hours(int $seconds): float
    {
        return $seconds / 3600;
    }
}

function get_main_categories_list()
{
    return Category::whereNull('category_id')->orderBy('order', 'asc')->get();
}

function format_price($num)
{
    return number_format($num/100, 2, '.', '');
}

