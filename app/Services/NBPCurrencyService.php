<?php

namespace App\Services;

use App\Interfaces\CurrencyServiceInterface;

use Illuminate\Support\Facades\Http;

final class NBPCurrencyService implements CurrencyServiceInterface
{
    public function getCurrencies(): array
    {
        $response = Http::get('https://api.nbp.pl/api/exchangerates/tables/A');

        if ($response->successful() && array_key_exists('rates', $response->json(0))) {
            return $response->json(0)['rates'];
        }

        return [];
    }
}
