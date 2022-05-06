<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\Service;
use App\Http\Filters\ProductsFilter;

// dump(Str::slug('text', '-'));

class CatalogController extends BaseController
{

    public function index(Request $request)
    {

        $bigBanner = $this->service->getBigBanner();
        $middleBanners = $this->service->getMiddleBanners();

        $productsTrendingItem = $this->catalogService->getProductsTrendingItem();
        $productsHotItem = $this->catalogService->getProductsHotItem();
        $productsOnSale = $this->catalogService->getProductsOnSale();
        $productsBestSeller = $this->catalogService->getProductsBestSeller();
        $productsTopViewed = $this->catalogService->getProductsTopViewed();

        return view('site.index', compact('productsTrendingItem', 'productsHotItem', 'productsOnSale', 'productsBestSeller', 'productsTopViewed', 'bigBanner', 'middleBanners'));
    }

    public function catalog(Request $request, Category $category)
    {
        // dump($category->childrenCategories);
        // dump($category->parentCategories);

        $breadCrumbs = $this->catalogService->getCategoryBreadCrumbs($category);
        $categoriesList = $category->id ? $category->categories : $this->mainCategoriesList;

        $products = $this->catalogService->getAllProductsFromChildCategories($category);

        return view('site.catalog', compact('category', 'categoriesList', 'products', 'breadCrumbs'));
    }

    public function search(SearchRequest $request)
    {
        $dataInput = $this->validate($request, [
            'category_id' => 'integer',
            'search' => 'string',
        ]);

        $data = $request->validated();

        $filter = app()->make(ProductsFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(12);

        return view('site.search', compact('products'));
    }

    public function product(Request $request, Product $product)
    {
        $breadCrumbs = $this->catalogService->getCategoryBreadCrumbs($product->category);
        return view('site.product', compact('product', 'breadCrumbs'));
    }

    public function hello(Request $request, Category $category)
    {
        // dump($category);
        // $this->catalogService->hello();
    }
}
