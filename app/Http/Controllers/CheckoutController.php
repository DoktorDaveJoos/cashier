<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCheckoutRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;

class CheckoutController extends Controller
{

    public function index($uuid) {
        return Inertia::render('DashboardCheckout', [
            'uuid' => $uuid
        ]);
    }


    public function create(CreateCheckoutRequest $createCheckout) {

        $festival = auth()->user();

        $pw = rand(1000,9999);

        $checkout = [
            'accessor' => Uuid::uuid4()->toString(),
            'plain' => $pw,
            'password' => bcrypt($pw)
        ];

        $festival->checkouts()->create(array_merge(
            $createCheckout->validated(),
            $checkout
        ));

    }


}
