<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Transaction $transaction)
    {
        return view('user.transaction.payment', compact('transaction'));
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
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function checkout(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'phone_number' => ['required', 'numeric'],
            'email' => ['required', 'email', 'exists:users,email'],
            'confirm_email' => ['required', 'same:email']
        ]);
        $data['user_id'] = Auth::user()->id;
        $data['ticket_id'] = $ticket->id;
        $data['unique_code'] = Str::random(8);
        $data['total_price'] = $ticket->price;

        $transaction = Transaction::create($data);

        return redirect(route('transaction.create', $transaction));
    }

    public function success()
    {
        return view('user.transaction.success');
    }
}
