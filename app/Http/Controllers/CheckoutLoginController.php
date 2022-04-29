<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CheckoutLoginRequest;
use App\Models\Checkout;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class CheckoutLoginController extends Controller
{


    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create($uuid)
    {
        $checkout = Checkout::where('accessor', $uuid)->firstOrFail();

        return Inertia::render('Auth/CheckoutLogin', [
            'status' => session('status'),
            'accessor' => $uuid,
            'name' => $checkout->name,
        ]);
    }

    public function store(CheckoutLoginRequest $request, $uuid)
    {
        $request->authenticate($uuid);

        $request->session()->regenerate();

        return redirect()->intended(route('checkout.index', ['uuid' => $uuid]));
    }
}
