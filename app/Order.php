<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Order extends Model
{
    protected $fillable = ['shopping_cart_id', 'total',
                            'guide_number', 'email', 'line1', 'line2', 'city',
                            'postal_code', 'country_code',  'state', 'recipient_name'];

    public static function createFromPayPalResponse($paypalResponse, $request) {
        $payer = $paypalResponse->payer;

        $orderData = (array) $payer->payer_info->shipping_address;

        $orderData['email'] = $payer->payer_info->email;
        $orderData['total'] = $request->shopping_cart->amountInCents($request);
        $orderData['shopping_cart_id'] = $request->shopping_cart->id;

        return Order::create($orderData);
    }

    public function address() {
        return "$this->line1 $this->line2";
    }

    public function shopping_cart() {
        return $this->belongsTo('App\ShoppingCart', 'shopping_cart_id', 'id', 'shopping_carts');
    }

    public function getCreatedAtAttribute($value) {
		return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y');
	}
}
