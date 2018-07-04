<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($element) {
                return [
                    'title' => $element->title,
                    'id' => $element->id,
                    'product_id' => $element->product_id,
                    'short_name' => $element->short_name,
                    'humanPrice' => '$'.(($element->price * $element->amount) / 100),
                    'numberPrice' => $element->price,
                    'description' => $element->description,
                    'amount' => $element->amount,
                    'shop_id' => $element->shop_id
                ];
            })
        ];
    }
}
