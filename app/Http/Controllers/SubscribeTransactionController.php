<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SubscribeTransaction;

class SubscribeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = SubscribeTransaction::with('user')->orderByDesc('id')->get();
        return view('admin.transactions.index' , compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subscribeTransaction = SubscribeTransaction::with('user')->find($id);
        return view('admin.transactions.show' , compact('subscribeTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubscribeTransaction $subscribeTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $subscribeTransaction = SubscribeTransaction::find($id);
        DB::transaction(function () use ($subscribeTransaction) {
            $subscribeTransaction->update([
                'is_paid' => true,
                'subscription_start_date' => Carbon::now(),
            ]);
        });

        return redirect()->route('admin.subscriptions_transaction.show', $subscribeTransaction->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubscribeTransaction $subscribeTransaction)
    {
        //
    }
}