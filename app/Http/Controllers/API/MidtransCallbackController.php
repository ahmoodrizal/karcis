<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Midtrans\CallbackService;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class MidtransCallbackController extends Controller
{
    public function callback()
    {
        $callback = new CallbackService();
        $transaction = $callback->getTransaction();

        // if ($callback->isSignatureKeyVerified()) {
        if ($callback->isSuccess()) {
            $this->sendNotifyToUser($transaction->user_id, 'Transaksi Ticket #' . $transaction->unique_code . ' Success');
            $transaction->update([
                'status' => 'success',
            ]);
        } else if ($callback->isExpire()) {
            $transaction->update([
                'status' => 'canceled',
            ]);
        } else if ($callback->isCancelled()) {
            $transaction->update([
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

    public function sendNotifyToUser($userId, $message)
    {
        $user = User::find($userId);
        $token = $user->firebase_token;

        $messaging = app('firebase.messaging');
        $notify = Notification::create('Transaction Success', $message);

        $message = CloudMessage::withTarget('token', $token)->withNotification($notify);

        $messaging->send($message);
    }
}
