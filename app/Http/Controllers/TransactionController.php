<?php

namespace App\Http\Controllers;

use HPWebdeveloper\LaravelPayPocket\Models\WalletsLog;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

public function ShowTransactions()
{
    $transactions = auth()->user()->walletLogs()->get();
    return view('profile.wallet.manageWalet', compact('transactions'));

}
}
