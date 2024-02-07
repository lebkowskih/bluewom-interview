<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Models\User;
final class UserFavoriteCurrencyRepository
{
    public function getAllForUser(User $user)
    {
        return $user->favoriteCurrency;
    }

    public function addFavoriteCurrency(Currency $currency, User $user)
    {
        return $currency->users()->attach($user->id);
    }

    public function deleteCurrency(Currency $currency, User $user)
    {
        return $user->favoriteCurrency()->detach($currency->id);
    }

    public function deleteAllUserFavoriteCurrencies(User $user)
    {
        return $user->favoriteCurrency()->detach();
    }
}
