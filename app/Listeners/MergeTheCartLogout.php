<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\DB;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Cart;

class MergeTheCartLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $user = $event->user;
        if ($user) {
            $cart = Cart::instance('cart')->content();
            if ($cart->count() > 0) {
                Cart::instance('cart')->store($user->id);
                Cart::instance('cart')->destroy();     
            } else {
                DB::table('shoppingcart')->where('identifier', $user->id)->delete();
            }
                  
        }

    }
}
