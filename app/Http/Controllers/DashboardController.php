<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index(Request $request) {

//        $results = Post::with(['user'])->where('user_id',$user_id);
//        $posts = $results->get();
        $user = User::with(['checkouts', 'products'])->where('id', $request->user()->id)->first();
//        dd($user->checkouts);

        if($user->type == "festival") {
            return Inertia::render('DashboardFestival', [
                'credit' => $user->credit,
                'checkouts' => $user->checkouts,
                'products' => $user->products
            ]);
        }




        return Inertia::render('Dashboard');
    }

}
