@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <h2>Mi Carrito de Compras</h2>
            </div>
            <div class="card-body pt-4">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <products-shopping-cart-component>
                        </products-shopping-cart-component>
                    </div>
                    <div class="col-12 col-md-6">
                        <p>Paga tu total facilmente con cualquiera de estos métodos, a traves de PayPal </p>
                        <img src="img/cards.png" alt="Cards" width="120" class="d-block mb-4">
                        <img src="img/paypal.png" alt="PayPal" width="120" class="d-block mb-4">
                        <a href="{{ route('payments.pay') }}" class="btn btn-primary">Proceder al pago</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
