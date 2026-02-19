<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WompiController extends Controller
{
    public function webhook(Request $request)
    {
        Log::info('Wompi Webhook received', $request->all());

        $data = $request->input('data.transaction');
        $event = $request->input('event');

        if ($event !== 'transaction.updated') {
            return response()->json(['status' => 'ignored'], 200);
        }

        $orderNumber = $data['reference'];
        $status = $data['status']; // APPROVED, DECLINED, VOIDED, ERROR

        $order = Order::where('order_number', $orderNumber)->first();

        if (!$order) {
            Log::error("Order not found: {$orderNumber}");
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Mapeo de estados
        switch ($status) {
            case 'APPROVED':
                $order->update([
                    'payment_status' => 'paid',
                    'status' => 'processing'
                ]);
                break;
            case 'DECLINED':
            case 'VOIDED':
            case 'ERROR':
                $order->update([
                    'payment_status' => 'failed',
                    'status' => 'cancelled'
                ]);
                break;
        }

        return response()->json(['status' => 'success'], 200);
    }
}
