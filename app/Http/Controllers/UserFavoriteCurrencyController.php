<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\User;
use App\Repositories\UserFavoriteCurrencyRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserFavoriteCurrencyController extends Controller
{
    public function __construct(
        protected UserFavoriteCurrencyRepository $userFavoriteCurrencyRepository
    ) {}
    public function store(Currency $currency): RedirectResponse
    {
        $user = Auth::user();

        if ($user === null) {
            abort(403);
        }

        assert($user instanceof User);

        $validator = Validator::make([
            'currencyId' => $currency->id
        ], [
            'currencyId' => Rule::unique('user_favorite_currencies', 'currency_id')->where(function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }),
        ]);

        if ($validator->fails()) {
            return redirect('/currencies')
                ->withErrors($validator);
        }

        $this->userFavoriteCurrencyRepository->addFavoriteCurrency($currency, $user);

        return redirect('/currencies');
    }

    public function delete(Currency $currency): RedirectResponse
    {
        $user = Auth::user();

        if ($user === null) {
            abort(403);
        }

        assert($user instanceof User);

        $this->userFavoriteCurrencyRepository->deleteCurrency($currency, $user);

        return redirect('/currencies');
    }

    public function deleteAll(): RedirectResponse
    {
        $user = Auth::user();

        if ($user === null) {
            abort(403);
        }

        assert($user instanceof User);

        $this->userFavoriteCurrencyRepository->deleteAllUserFavoriteCurrencies($user);

        return redirect('/currencies');
    }
}
