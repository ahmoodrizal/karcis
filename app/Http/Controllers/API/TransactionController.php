<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Services\Midtrans\CreateQrCodeService;
use App\Services\Midtrans\CreateVirtualAccountService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function order(Request $request)
    {
        $ticket = Ticket::whereId($request['ticket_id'])->first();
        $quotaLeft = Transaction::where([
            ['ticket_id', '=', $request['ticket_id']], ['status', '!=', 'canceled']
        ])->count();

        if ($ticket->quota == $quotaLeft) {
            return response()->json([
                'message' => 'Sorry, This ticket is already sold out',
            ], 400);
        }

        $data = $request->validate([
            'ticket_id' => ['required', 'exists:tickets,id'],
            'payment_method' => ['required', 'in:bank_transfer,e_wallet'],
            'payment_va_bank' => ['required', 'in:bca,bni,bri,mandiri,gopay,qris,shopeepay']
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['unique_code'] = 'TRX-' . rand(10000, 99999);
        $data['total_price'] = $ticket->price;
        $data['expired_at'] = now()->addMinutes(10);

        $transaction = Transaction::create($data);

        if ($request['payment_method'] == 'bank_transfer') {
            // Midtrans Virtual Account Integration with Core API
            $midtrans = new CreateVirtualAccountService($transaction->load('user', 'ticket'));
            $apiResponse = $midtrans->getVirtualAccount();

            $transaction->payment_va_number = $apiResponse->va_numbers[0]->va_number;
            $transaction->save();
        } else {
            // Midtrans QRIS Integration with Core API
            $midtrans = new CreateQrCodeService($transaction->load('user', 'ticket'));
            $apiResponse = $midtrans->getSnapToken();

            $transaction->payment_url = $apiResponse->actions[0]->url;
            $transaction->save();
        }

        return response([
            'message' => 'Success create an order',
            'transaction' => $transaction,
        ], 201);
    }

    // Fetch All User's Transactions
    public function transactions()
    {
        $transactions = Transaction::whereUserId(auth()->user()->id)->latest()->get();

        return response()->json([
            'message' => 'Success fetch User transactions',
            'transactions' => $transactions,
        ], 200);
    }

    // Fetch Transaction Detail by id
    public function show(Transaction $transaction)
    {
        return response()->json([
            'message' => 'Success fetch transaction detail',
            'transaction' => $transaction
        ], 200);
    }
}
