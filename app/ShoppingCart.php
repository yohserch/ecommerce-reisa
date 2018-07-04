<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShoppingCart extends Model
{
    public static function findOrCreateById($shopping_cart_id) {
        if ($shopping_cart_id) {
            return ShoppingCart::find($shopping_cart_id);
        } else {
            return ShoppingCart::create();
        }
    }

    public function generateCustomID() {
        return md5("$this->id $this->updated_at");
    }

    public function updateCustomID() {
        $this->custom_id = $this->generateCustomID();
        $this->save();
    }


    public function products() {
        return $this->belongsToMany('App\Product', 'product_in_shopping_carts');
    }

    public function productsOrder() {
        $products = DB::table('product_in_shopping_carts')
                        ->join('products', 'product_in_shopping_carts.product_id','=','products.id')
                        ->select('products.title','products.price', 'product_in_shopping_carts.amount')
                        ->where('product_in_shopping_carts.shopping_cart_id', $this->id)
                        ->get();
        return $products;
    }

    public function order() {
        return $this->hasOne('App\Order', 'orders')->first();
    }

    public function productsCount() {
        return $this->products()->count();
    }

    public function amount($request) {
        $amount = 0;
        $products = DB::table('product_in_shopping_carts')
                        ->join('products', 'product_in_shopping_carts.product_id','=','products.id')
                        ->select('products.price', 'product_in_shopping_carts.amount')
                        ->where('product_in_shopping_carts.shopping_cart_id', $request->shopping_cart->id)
                        ->get();
        foreach($products as $product) {
            $amount += ($product->price * $product->amount);
        }
        return $amount / 100;
    }

    public function amountInCents($request) {
        $amount = 0;
        $products = DB::table('product_in_shopping_carts')
                        ->join('products', 'product_in_shopping_carts.product_id','=','products.id')
                        ->select('products.price', 'product_in_shopping_carts.amount')
                        ->where('product_in_shopping_carts.shopping_cart_id', $request->shopping_cart->id)
                        ->get();
        foreach($products as $product) {
            $amount += ($product->price * $product->amount);
        }
        return $amount;
    }
}
