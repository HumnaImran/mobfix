<?php

namespace App\Http\Controllers;

use HPWebdeveloper\LaravelPayPocket\Exceptions\InvalidDepositException;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DepositStoreRequest;

use Illuminate\Http\Request;

class DepositController extends Controller
{
    //

    // public function index

    public function store(Request $request): RedirectResponse
    {
        try{
            LaravelPayPocket::deposit(auth()->user(),$request->input('wallet'), $request->input('amount'));

        }
        catch(InvalidDepositException $e)
        {
            return redirect()->back()->with('status', $e->getMessage());

        }

        return redirect()->back()->with('status','Deposit done successfully');
    }
}
