<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\CurrencyRepository;
use App\Repositories\UserFavoriteCurrencyRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

final class CurrencyController extends Controller
{
    public User $user;
    public function __construct(
        protected CurrencyRepository $currencyRepository,
        protected UserFavoriteCurrencyRepository $userFavoriteCurrencyRepository
    ) {}

    public function index(): View
    {
        $user = Auth::user();

        if ($user === null) {
            abort(403);
        }

        return view('currencies.index', [
            'currencies' => $this->currencyRepository->getAllPaginated(),
            'favoriteCurrencies' => $this->userFavoriteCurrencyRepository->getAllForUser($user),
        ]);
    }
}
