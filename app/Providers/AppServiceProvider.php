<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\ShoppingCart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            $session_name = 'shopping_cart_id';
            $shopping_cart_id = \Session::get($session_name);
            $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);
            \Session::put($session_name, $shopping_cart->id);
            $view->with('productsCount', $shopping_cart->productsCount());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
