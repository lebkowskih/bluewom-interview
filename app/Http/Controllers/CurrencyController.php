<?php

namespace App\Http\Controllers;

use App\Repositories\CurrencyRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class CurrencyController extends Controller
{
    public function __construct(
        protected CurrencyRepository $currencyRepository
    ) {}

    public function index(): View
    {
        return view('currencies.index', [
            'currencies' => $this->currencyRepository->getAllPaginated(),
        ]);
    }
}
