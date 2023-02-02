<?php

namespace App\Listeners;

use Cart;
use Illuminate\Auth\Events\Login;

use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MergeTheCart
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
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        if (DB::table('shoppingcart')->where('identifier', $user->id)->exists()){
            Cart::instance('cart')->restore($user->id);
        } else {
            Cart::instance('cart')->store($user->id);
        }

        
     
    }
}
