<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class CatalogService
{
    public $mainCategoriesList;

    public function __construct($mainCategoriesList = null)
    {
        if ($mainCategoriesList == null) {
            $this->mainCategoriesList = get_main_categories_list();
        } else {
            $this->mainCategoriesList = $mainCategoriesList;
        }
    }

    //////////////// Categories ///////////////////////////

    public function getCategoriesList($category_id = null)
    {
        if ($category_id === null) {
            return $this->mainCategoriesList;
        } else {
            return Category::where('category_id', $category_id)->orderBy('order', 'asc')->get();
        }
    }

    public function getCategoryBreadCrumbs(Category $category)
    {
        $breadCrumbs[] = array(
            'id' => $category->id,
            'title' => $category->title,
            'slug' => $category->slug,
            'last' => true
        );

        while ($category->parentCategories) {
            if ($category->parentCategories) {
                $category = $category->parentCategories;
                $breadCrumbs[] = array(
                    'id' => $category->id,
                    'title' => $category->title,
                    'slug' => $category->slug,
                    'last' => false
                );
            }
        }

        $breadCrumbs[] = array(
            'id' => '',
            'title' => 'Catalog',
            'slug' => '',
            'last' => ($category->id ? false : true)
        );

        krsort($breadCrumbs);

        return $breadCrumbs;
    }

    public function getCatalogBreadCrumbs()
    {
        $breadCrumbs[] = array(
            'id' => '',
            'title' => 'Catalog',
            'slug' => '',
            'last' => true
        );

        return $breadCrumbs;
    }

    public function getAllChildrenCategories(Category $category)
    {
        $result = [];

        if ($category->categories) {
            foreach ($category->childrenCategories as $childCategory) {

                $result[$childCategory->id] = array(
                    'id' => $childCategory->id,
                    'title' => $childCategory->title,
                    'slug' => $childCategory->slug,
                    'childs' => $this->getAllChildrenCategories($childCategory)
                );
            }
        }
        return $result;
    }

    public function getAllIdsChildrensCategories(Category $category)
    {
        $result[$category->id] = $category->id;

        if ($category->categories) {
            foreach ($category->childrenCategories as $childCategory) {
                $result = $result + $this->getAllIdsChildrensCategories($childCategory);
            }
        }
        return $result;
    }


    //////////////// Products ///////////////////////////

    public function getAllProductsFromChildCategories(Category $category)
    {
        $product_category_ids = $this->getAllIdsChildrensCategories($category);
        return Product::whereIn('category_id', $product_category_ids)->paginate(12);
    }

    public function getRandomProductsFromChildCategories(Category $category, $limit = 8)
    {
        $product_category_ids = $this->getAllIdsChildrensCategories($category);
        return Product::whereIn('category_id', $product_category_ids)->inRandomOrder()->limit($limit)->get();
    }


    public function getProductsTrendingItem()
    {
        $products = [];
        foreach ($this->mainCategoriesList as $category) {
            $products[$category->id] = $this->getRandomProductsFromChildCategories($category);
        }
        return $products;
    }

    public function getProductsHotItem()
    {
        return Product::where(function ($query) {
            $query->orWhere('is_hot', 1)
                ->orWhere('sale_percent', '>', 0)
                ->orWhere('is_new', 1);
        })->inRandomOrder()->limit(12)->get();
    }

    public function getProductsOnSale()
    {
        return Product::where('sale_percent', '>', 0)->inRandomOrder()->limit(3)->get();
    }

    public function getProductsBestSeller()
    {
        return Product::where('is_bestseller', 1)->inRandomOrder()->limit(3)->get();
    }

    public function getProductsTopViewed()
    {
        return Product::orderBy('viewed', 'desc')->limit(60)->get()->random(3);
    }


}
