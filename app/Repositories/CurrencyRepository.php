<?php

namespace App\Repositories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class CurrencyRepository
{
    public function getAll(): Collection
    {
        return Currency::all();
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return Currency::paginate(5);
    }
}
