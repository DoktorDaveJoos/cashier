<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCheckoutRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Ramsey\Uuid\Uuid;

class CheckoutController extends Controller
{

    public function index(Request $request, $uuid): \Inertia\Response
    {
        $products = auth()->user()->festival->products;

        if ($request->input('user')) {
            ray($request->input('user'));
        }

        return Inertia::render('Checkout/Index', [
            'uuid' => $uuid,
            'products' => $products,
            'customer' => Inertia::lazy(fn() => User::find($request->input('user')))
        ]);
    }

//    public function create(CreateCheckoutRequest $createCheckout) {
//
//        $festival = auth()->user();
//
//        $pw = rand(1000,9999);
//
//        $checkout = [
//            'accessor' => Uuid::uuid4()->toString(),
//            'plain' => $pw,
//            'password' => bcrypt($pw)
//        ];
//
//        $festival->checkouts()->create(array_merge(
//            $createCheckout->validated(),
//            $checkout
//        ));
//
//    }

}
