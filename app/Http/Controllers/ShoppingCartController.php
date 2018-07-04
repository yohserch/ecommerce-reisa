<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\ProductsCollection;

class ShoppingCartController extends Controller
{
    public function __construct() {
        $this->middleware('shopping_cart');
    }

    public function show(Request $request) {
        // return $request->shopping_cart->amount();
        return view('shopping_cart.show', ['shopping_cart' => $request->shopping_cart]);
    }

    public function products(Request $request) {
        if ($request->ajax()) {
            $products = DB::table('product_in_shopping_carts')
                        ->join('products', 'product_in_shopping_carts.product_id','=','products.id')
                        ->select('products.*', 'product_in_shopping_carts.id as shop_id', 'product_in_shopping_carts.amount', 'product_in_shopping_carts.product_id')
                        ->where('product_in_shopping_carts.shopping_cart_id', $request->shopping_cart->id)
                        ->get();
            return new ProductsCollection($products);
        }
        abort(404);
    }
}
