<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductInShoppingCart;

class ProductInShoppingCartsController extends Controller
{
    public function __construct() {
        $this->middleware('shopping_cart');
    }

    public function store(Request $request) {
        $in_shopping_cart = ProductInShoppingCart::firstOrNew([
            'shopping_cart_id' => $request->shopping_cart->id,
            'product_id' => $request->product_id
        ]);
        $in_shopping_cart->amount += $request->amount;
        $in_shopping_cart->save();

        if($in_shopping_cart) {
            return response()->json([
                'message'=> 'Item añadido correctamente al carrito.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Ha ocurrido un error al añadir el item seleccionado.'
            ], 400);
        }
    }

    public function destroy($id) {
        if(ProductInShoppingCart::destroy($id)) {
            return response()->json([
                'message' => "Elemento removido con éxito"
            ], 200);
        } else {
            return response()->json([
                'message' => "Ocurrio un error al procesar su solicitud"
            ], 400);
        }

    }

    public function reset(Request $request) {
        $deleted = ProductInShoppingCart::where('shopping_cart_id', $request->shopping_cart->id)->delete();
        if($deleted) {
            return response()->json([
                'message' => 'Carrito vaciado con éxito'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Ocurrio un error al vaciar el carrito'
            ], 400);
        }

    }
}
