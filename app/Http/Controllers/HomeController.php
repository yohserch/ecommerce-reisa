<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Product;
use App\Order;
use App\Mail\OrderCreated;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('shopping_cart');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
        // $order = Order::all()->first();
        // Mail::to(["def.serch@gmail.com", "sergio.duran@reisa.mx"])->send(new OrderCreated($order));
        // return new \App\Mail\OrderCreated($order);
    }

    public function prueba(Request $request) {
        $shop = $request->shopping_cart;
        ProductInShoppingCart::where('shopping_cart_id', '=', $shop->id);
    }
}
