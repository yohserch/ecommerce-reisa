<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\PayPal;
use App\Order;
use App\Mail\OrderCreated;

class PaymentsController extends Controller
{

    public function __construct() {
        $this->middleware('shopping_cart');
    }

    public function pay(Request $request) {
        $amount = $request->shopping_cart->amount($request);
        $paypal = new PayPal;

        $response = $paypal->charge($amount);

        $redirectLinks = array_filter($response->result->links, function($link) {
            return $link->method == 'REDIRECT';
        });
        $redirectLinks = array_values($redirectLinks);

        return redirect($redirectLinks[0]->href);
    }

    public function execute(Request $request) {
        $paypal = new PayPal;
        $response = $paypal->execute($request->paymentId, $request->PayerID);

        if($response->statusCode == 200) {
            $order = Order::createFromPayPalResponse($response->result, $request);
            if($order) {
                $request->shopping_cart->updateCustomID();
                \Session::remove('shopping_cart_id');
                Mail::to(["def.serch@gmail.com", "sergio.duran@reisa.mx"])->send(new OrderCreated($order));
                return view('payments.success', [
                    'order' => $order,
                    'shopping_cart' => $request->shopping_cart]);
            }
        } else {
            return redirect()->route('shopping_cart.show');
        }
    }

    public function show($custom_id) {
        $shopping_cart = ShoppingCart::where('custom_id', $custom_id)->first();
        $order = $shopping_cart->order();
        return view('payments.success', [
            'order' => $order,
            'shopping_cart' => $shopping_cart
        ]);
    }
}
