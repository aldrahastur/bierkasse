<?php

namespace App\Http\Controllers;

class TransactionController extends Controller
{
    public function __invoke()
    {
        return view('transactions.index');
    }
}
