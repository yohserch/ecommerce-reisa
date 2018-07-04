<?php

namespace App\Http\Middleware;

use Closure;
use App\ShoppingCart;

class SetShoppingCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session_name = 'shopping_cart_id';
        $shopping_cart_id = \Session::get($session_name);
        $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);
        \Session::put($session_name, $shopping_cart->id);
        $request->shopping_cart = $shopping_cart;
        return $next($request);
    }
}
