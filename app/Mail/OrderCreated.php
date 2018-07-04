<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\ShoppingCart;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $products;
    public $shopping_cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
        $this->shopping_cart = $this->order->shopping_cart()->first();
        $this->products = $this->shopping_cart->productsOrder();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.notification', [
            'order' => $this->order,
            'shopping_cart' => $this->shopping_cart,
            'products' => $this->products
        ]);
    }
}
