<?php

namespace App\Services\Midtrans;

use Midtrans\CoreApi;
use Midtrans\Snap;

class CreateQrCodeService extends Midtrans
{
    protected $transaction;

    public function __construct($transaction)
    {
        parent::__construct();

        $this->transaction = $transaction;
    }

    public function getSnapToken()
    {

        $item_details[] = [
            'id' => $this->transaction->ticket->id,
            'price' => $this->transaction->ticket->price,
            'quantity' => 1,
            'name' => $this->transaction->ticket->name . 'Ticket',
        ];

        $params = [
            'payment_type' => $this->transaction->payment_va_bank,
            'transaction_details' => [
                'order_id' => $this->transaction->unique_code,
                'gross_amount' => $this->transaction->total_price,
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => $this->transaction->user->name,
                'email' => $this->transaction->user->email,
                'phone' => $this->transaction->user->phone_number ??  '087723015713',
            ],
            'gopay' => [
                'enable_callback' => true,
                'callback_url' => 'someapps://callback'
            ]
        ];

        $response = CoreApi::charge($params);

        return $response;
    }
}
