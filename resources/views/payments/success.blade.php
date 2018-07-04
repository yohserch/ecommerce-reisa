@extends('layouts.app')

@section('content')

<div class="container buy">
    <h3>Tu pago ha sido procesado</h3>
    <p>Corrobora los detalles de tu compra</p>

    <div class="row buy-detail">
        <div class="col-6">Correo:</div>
        <div class="col-6">{{$order->email}}</div>
    </div>
    <div class="row buy-detail">
        <div class="col-6">Dirección:</div>
        <div class="col-6">{{$order->address()}}</div>
    </div>
    <div class="row buy-detail">
        <div class="col-6">Código Postal:</div>
        <div class="col-6">{{$order->postal_code}}</div>
    </div>
    <div class="row buy-detail">
        <div class="col-6">Ciudad:</div>
        <div class="col-6">{{$order->city}}</div>
    </div>
    <div class="row buy-detail">
        <div class="col-6">Estado y Pais:</div>
        <div class="col-6">{{"$order->state $order->country_code"}}</div>
    </div>
    <div class="text-center">
        <a href="{{ route('payments.show', $shopping_cart->custom_id)}}">Link permanente de tu compra</a>
    </div>
</div>



@endsection
