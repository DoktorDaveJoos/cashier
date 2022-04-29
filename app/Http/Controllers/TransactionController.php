<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class TransactionController extends Controller
{


    public function store(Request $request, $uuid)
    {
        Transaction::create([
                'from_id' => $request->userId,
                'to_id' => auth()->user()->festival->id,
                'description' => $request->description,
                'amount' => $request->amount,
            ]
        );

        return Redirect::route('checkout.index', $uuid);
    }
}
