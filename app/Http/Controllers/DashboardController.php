<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index(Request $request): \Inertia\Response
    {
        /** @var User $user */
        $user = auth()->user();

        if ($user->isFestival()) {
            return $this->handleFestivalIndex($request);
        }

        return Inertia::render('DashboardVisitor', [
            'balance' => $user->getBalance(),
            'transactions' => $user->transactions()
        ]);
    }

    public function fake(Request $request)
    {
        $user = $request->user();

        $transaction = new Transaction;

        $transaction->to_id = $user->id;
        $transaction->from_id = 2;
        $transaction->amount = 50.00;
        $transaction->description = sprintf('Fake fund - %s', random_int(0, 100));

        $transaction->save();

        $transactions = $user->transactions();

        return Inertia::render('DashboardVisitor', [
            'balance' => $user->getBalance(),
            'transactions' => $transactions,
        ]);
    }

    private function handleFestivalIndex(Request $request): \Inertia\Response
    {
        $user = $request->user();

        $transCmd = DB::selectOne('select count(*) as count from transactions where from_id = ? or to_id = ?', [$user->id, $user->id]);
        $transactions = $user->transactions();

        return Inertia::render('Festival/DashboardFestival', [
            'balance' => $user->getBalance(),
            'checkouts' => $user->checkouts,
            'products' => $user->products,
            'transactions' => $transactions,
            'transactionCount' => $transCmd->count
        ]);
    }

    public function checkouts(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        return Inertia::render('Festival/Checkouts', [
            'checkouts' => $user->checkouts,
        ]);
    }

    public function products(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        return Inertia::render('Festival/Products', [
            'products' => $user->products,
        ]);
    }
}
