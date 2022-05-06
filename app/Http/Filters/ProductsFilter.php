<?php

namespace App\Http\Filters;

use App\Models\Category;
use App\Models\Product;
use App\Services\CatalogService;
use Illuminate\Database\Eloquent\Builder;

class ProductsFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const CATEGORY_ID = 'category_id';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', '%' . $value . '%');
    }

    public function categoryId(Builder $builder, $value)
    {
        if ($value > 0) {
            $service = new CatalogService();
            $product_category_ids = $service->getAllIdsChildrensCategories(Category::find($value));
            $builder->whereIn('category_id', $product_category_ids);
        }
    }
}
