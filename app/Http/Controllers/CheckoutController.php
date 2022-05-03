<?php

namespace App\Http\Controllers;

use App\Models\PaymentSteps;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CheckoutController extends Controller
{

    public function index(Request $request, $uuid): Response
    {
        $products = auth()->user()->festival->products;

        return Inertia::render('Checkout/Index', [
            'uuid' => $uuid,
            'products' => $products,
            'payment' => Inertia::lazy(fn() => self::fetchPayingCustomer($request)),
        ]);
    }

    private static function fetchPayingCustomer(Request $request)
    {
        try {
            $user = User::findOrFail($request->input('user'));
            $lol =  PaymentSteps::withUser($user);
            ray($lol);
            return $lol;
        } catch (ModelNotFoundException $e) {
            return PaymentSteps::withErrors([$e->getMessage()]);
        }
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
