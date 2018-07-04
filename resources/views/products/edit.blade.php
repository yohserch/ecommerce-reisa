@extends('layouts.app')


@section('content')
<div class="container">

    <div class="card">
        <h4 class="card-header">Editar Producto - {{ $product->title }}</h4>

        <div class="card-body">
            @include('products.form')

        </div>
    </div>

</div>

@endsection
