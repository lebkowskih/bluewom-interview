<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserFavoriteCurrencyController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user != null && $request->currencyId != null) {
            $user->favoriteCurrency()->attach($request->currencyId);
        }

        return redirect('/currencies');
    }
}
