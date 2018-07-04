@extends('layouts.app')


@section('content')
<div class="container">

    <div class="card">
        <h4 class="card-header">Crear Nuevo Producto</h4>

        <div class="card-body">
            @include('products.form')

        </div>
    </div>

</div>

@endsection
