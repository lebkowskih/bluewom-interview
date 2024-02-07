<?php

namespace App\Providers;

use App\Interfaces\CurrencyServiceInterface;
use App\Services\NBPCurrencyService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CurrencyServiceInterface::class, NBPCurrencyService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
