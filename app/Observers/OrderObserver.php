<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\HistoryOrder;
use Illuminate\Support\Facades\Auth;

class OrderObserver
{
    public function created(Order $order)
    {
        HistoryOrder::create([
            'order_id' => $order->id,
            'new_status' => Order::PENDING,
            'description' => 'orden registrada'
        ]);
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        
    }

    /**
     * Handle the Order "updating" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updating(Order $order)
    {
        if (!is_null($order->status)) {
            if ($order->isDirty('status')) {
                HistoryOrder::create([
                    'order_id' => $order->id,
                    'user_id' => Auth::user()->id,
                    'old_status' => $order->getOriginal('status'),
                    'new_status' => $order->status,
                    // 'description' => $description
                ]);
            }
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
