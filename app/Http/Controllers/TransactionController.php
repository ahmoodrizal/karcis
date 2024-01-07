<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;
use Midtrans\Transaction as MidtransTransaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    public function index()
    {
        $transactions = Transaction::with('user', 'ticket')
            ->latest()->paginate(8);

        return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Transaction $transaction)
    {
        if ($transaction->user_id != auth()->user()->id) {
            return redirect(route('user.transactions'));
        }

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
        if ($ticket->event->is_draft) {
            return redirect(route('welcome'));
        }

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

    public function payment(Transaction $transaction)
    {
        $this->getSnapRedirect($transaction);

        return redirect(route('user.transactions'));
    }

    public function getSnapRedirect(Transaction $transaction)
    {
        $orderId = $transaction->id . '-' . $transaction->unique_code;
        $event_name = Str::title($transaction->ticket->event->name);
        $ticket_name = Str::title($transaction->ticket->name);
        $item_name = Str::of('1 x ' . $ticket_name . 'Ticket / ' . $event_name)->limit('48');

        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $transaction->total_price
        ];

        $item_details[] = [
            'id' => $orderId,
            'price' => $transaction->total_price,
            'quantity' => 1,
            'name' => $item_name,
        ];

        $userData = [
            'first_name' => $transaction->user->name,
            'last_name' => '',
            'address' => 'Indonesia',
            'city' => '',
            'postal_code' => '',
            'phone' => $transaction->user->phone_number,
            'country_code' => 'IDN'
        ];

        $customer_detail = [
            'first_name' => $userData['first_name'],
            'last_name' => '',
            'phone' => $transaction->user->phone_number,
            'email' => $transaction->user->email,
            'billing_address' => $userData,
            'shipping_address' => $userData,
        ];

        $page_expire = [
            'duration' => 5,
            'unit' => 'minutes'
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_detail,
            'page_expiry' => $page_expire,
        ];

        try {
            // Get Snap Payment URL
            $payment_url = Snap::createTransaction($midtrans_params)->redirect_url;
            $transaction->payment_url = $payment_url;
            $transaction->save();

            return $payment_url;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function midtransCallback(Request $request)
    {
        $notif = $request->method() == 'POST' ? new Notification() : MidtransTransaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $transaction_id = explode('-', $notif->order_id)[0];
        $transaction = Transaction::find($transaction_id);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $transaction->status = 'waiting';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $transaction->status = 'success';
            }
        } else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $transaction->status = 'canceled';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $transaction->status = 'canceled';
            }
        } else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $transaction->status = 'canceled';
        } else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $transaction->status = 'success';
        } else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $transaction->status = 'waiting';
        } else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $transaction->status = 'canceled';
        }

        $transaction->save();
        return view('user.transaction.success');
    }

    public function success()
    {
        return view('user.transaction.success');
    }
}
