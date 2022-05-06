<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketListRequest;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OrderController extends BaseController
{

    public function cart(Request $request)
    {
        return view('site.cart');
    }

    public function checkout(Request $request)
    {
        $payments = Payment::all();
        return view('site.checkout', compact('payments'));
    }

    public function getBasketList(BasketListRequest $request)
    {
        $dataInput = $request->validated();

        $basket = $this->service->calculateBasket($dataInput);

        return response()->json($basket, 200);
    }

    public function store(OrderStoreRequest $request)
    {
        $dataInput = $request->validated();

        $basket = $this->service->calculateBasket($dataInput);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'post' => $request->post,
            'payment_id' => $request->payment_id,
            'order_status_id' => 1,
            'amount' => $basket['amount'],
            'full_amount' => $basket['full_amount'],
        ]);

        foreach ($basket['basket'] as $id => $quantity) {
            $order->products()->attach([$id => ['quantity' => $quantity]]);
        }

        return response()->json($basket, 200);
    }

    public function wishlist()
    {
        return view('site.wishlist');
    }

    public function getWishList(Request $request)
    {
        $dataInput = $this->validate($request, [
            'wishlist' => 'required|array',
            'wishlist.*' => 'required|integer'
        ]);

        $result = $this->service->getWishList($dataInput);

        return response()->json($result, 200);
    }
}
