<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Midtrans\CallbackService;

class MidtransCallbackController extends Controller
{
    public function callback()
    {
        $callback = new CallbackService();
        $order = $callback->getTransaction();

        // if ($callback->isSignatureKeyVerified()) {
        if ($callback->isSuccess()) {
            $order->update([
                'status' => 'success',
            ]);
        } else if ($callback->isExpire()) {
            $order->update([
                'status' => 'canceled',
            ]);
        } else if ($callback->isCancelled()) {
            $order->update([
                'status' => 'canceled',
            ]);
        }
        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'Callback success',
            ],
        ]);
        // }

        // return response()->json([
        //     'meta' => [
        //         'code' => 400,
        //         'message' => 'Callback failed',
        //     ],
        // ]);
    }
}
