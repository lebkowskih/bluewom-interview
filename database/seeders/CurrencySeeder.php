<?php

namespace Database\Seeders;

use App\Interfaces\CurrencyServiceInterface;
use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function __construct(
        protected CurrencyServiceInterface $currencyServiceInterface
    ) {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (count($this->currencyServiceInterface->getCurrencies()) != 0) {
            foreach ($this->currencyServiceInterface->getCurrencies() as $currency) {
                Currency::updateOrCreate(
                    ['code' => $currency['code']],
                    [
                        'currency' => $currency['currency'],
                        'mid' => $currency['mid'],
                    ]
                );
            }
        }
    }
}
