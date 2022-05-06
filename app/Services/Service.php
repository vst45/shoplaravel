<?php

namespace App\Services;

use App\Models\Bigbanner;
use App\Models\Middlebanner;
use App\Models\Product;
use Illuminate\Support\Str;

class Service
{
    public function getBigBanner()
    {
        return Bigbanner::inRandomOrder()->first();
    }

    public function getMiddleBanners()
    {
        return Middlebanner::inRandomOrder()->limit(5)->get();
    }

    public function calculateBasket($data)
    {
        foreach ($data['basket'] as $array) {
            $basket[$array['id']] =  $array['quantity'];
        }

        $products = Product::select('id', 'name', 'price', 'slug', 'sale_percent')
            ->whereIn('id', array_keys($basket))
            ->orderBy('name')
            ->get()
            ->keyBy('id')
            ->toArray();

        $amount = 0;
        $full_amount = 0;

        foreach ($products as &$product) {

            $product['quantity'] = $basket[$product['id']];
            $product['amount'] = $product['actual_price'] * $product['quantity'];

            $amount += $product['amount'];
            $full_amount += $product['price'] * $product['quantity'];
        }

        $amount = floor($amount * 100) / 100;
        $full_amount = floor($full_amount * 100) / 100;

        return compact('amount', 'full_amount', 'products', 'basket');
    }

    public function getWishList($data)
    {
        // foreach ($data['basket'] as $array) {
        //     $basket[$array['id']] =  $array['quantity'];
        // }

        $products = Product::select('id', 'name', 'price', 'slug', 'sale_percent')
            ->whereIn('id', array_keys($data['wishlist']))
            ->orderBy('name')
            ->get()
            ->keyBy('id')
            ->toArray();


        return compact('products');
    }


}
