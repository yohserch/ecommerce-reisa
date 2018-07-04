@extends('layouts.app')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="corousel-text">
            <h2>V-Ray for {{str_replace('-', ' ', $product->short_name)}}</h2>
        </div>
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('img')}}/{{$product->short_name}}-1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('img')}}/{{$product->short_name}}-2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('img')}}/{{$product->short_name}}-3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="overview">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="row">
                <div class="col-2 overview-image">
                    <img src="{{asset('img/certificate.svg')}}" alt="">
                </div>
                <div class="col-10">
                    <h2>CALIDAD</h2>
                    <p>
                        V-Ray viene con todas las herramientas de iluminación, sombreado y representación que necesita para crear imágenes profesionales y fotorrealistas y animación.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="row">
                <div class="col-2 overview-image">
                    <img src="{{ asset('img/physics.svg')}}" alt="">
                </div>
                <div class="col-10">
                    <h2>PODER</h2>
                    <p>
                        Construido para manejar sus proyectos más grandes y sus escenas más difíciles. Renderizar cualquier cosa y todo con V-Ray.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="row">
                <div class="col-2 overview-image">
                    <img src="{{asset('img/races.svg')}}" alt="">
                </div>
                <div class="col-10">
                    <h2>VELOCIDAD</h2>
                    <p>
                        Pasa menos tiempo esperando y más tiempo siendo creativo. Entregue su mejor trabajo y nunca pierda un plazo.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="row">
                <div class="col-2 overview-image">
                    <img src="{{asset('img/light-bulb.svg')}}" alt="">
                </div>
                <div class="col-10">
                    <h2>CONTROL CREATIVO</h2>
                    <p>
                        V-Ray te pone en el asiento del conductor. Tienes el control. Con las versátiles características de V-Ray, puede elegir el mejor enfoque para su escena.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="row">
                <div class="col-2 overview-image">
                    <img src="{{asset('img/target.svg')}}" alt="">
                </div>
                <div class="col-10">
                    <h2>INTEGRACIÓN INTELIGENTE</h2>
                    <p>
                            Trabaja como quieras, sin interrupciones. La integración transparente V-Ray mantiene su flujo de trabajo fluido y suave.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="row">
                <div class="col-2 overview-image">
                    <img src="{{asset('img/planet-earth.svg')}}" alt="">
                </div>
                <div class="col-10">
                    <h2>UN ESTÁNDAR DE LA INDUSTRIA</h2>
                    <p>
                        Los artistas independientes y los mejores estudios eligen V-Ray todos los días para crear diseños de clase mundial y efectos visuales.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<h4 class="pricing">PRECIO</h4>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 card-pricing">
            <h3>WORKSTATION</h3>
            <span>$ {{$product->price}}</span>
            <add-product-btn :product='{!! json_encode($product) !!}' ></add-product-btn>
        </div>
    </div>
</div>
@endsection
