@extends('layouts.app')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="corousel-text">
                <img src="{{asset('img/vray.svg')}}" alt="" class="vray">
                <div></div>
                <img src="{{asset('img/chaos.svg')}}" alt="" class="chaos">
            </div>

            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('img/city.png')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/rocket.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/stairs.jpg')}}" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/porsche.jpg')}}" alt="Third slide">
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
    <div class="container introduction">
        <h2>Render.Fácil.Rápido</h2>
        <p>
            V-ray está desarrollado por artistas, diseñadores y especialistas multidisciplinarios,<br>
            nuestro software de render 3D te ayudará a visualizar cualquier cosa que puedas imaginar. <br>
            Ahorra tiempo y desarrolla tu mejor trabajo - con la tecnología de Chaos Group.
        </p>
    </div>

    <section class="productos">
        <h2>PRODUCTOS</h2>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 product-item">
                    <div class="title">
                        <img src="{{asset('img/vray.svg')}}" alt="">
                        <span></span>
                        3D MAX
                    </div>
                    <a href="{{ route('products.show', '3d-max') }}">Leer más <i class="material-icons">arrow_right_alt</i></a>
                    <img src="{{asset('img/house.jpg')}}">
                </div>
                <div class="col-sm-12 col-md-6 product-item">
                    <div class="title">
                        <img src="{{asset('img/vray.svg')}}" alt="">
                        <span></span>
                        MAYA
                    </div>
                    <a href="#">Leer más <i class="material-icons">arrow_right_alt</i></a>
                    <img src="{{asset('img/orc.jpg')}}">
                </div>
                <div class="col-sm-12 col-md-6 product-item">
                    <div class="title">
                        <img src="{{asset('img/vray.svg')}}" alt="">
                        <span></span>
                        CINEMA 4D
                    </div>
                    <a href="#">Leer más <i class="material-icons">arrow_right_alt</i></a>
                    <img src="{{asset('img/fox.jpg')}}">
                </div>
                <div class="col-sm-12 col-md-6 product-item">
                    <div class="title">
                        <img src="{{asset('img/vray.svg')}}" alt="">
                        <span></span>
                        SKETCHUP
                    </div>
                    <a href="#">Leer más <i class="material-icons">arrow_right_alt</i></a>
                    <img src="{{asset('img/poliform.jpg')}}">
                </div>
                <div class="col-sm-12 col-md-6 product-item">
                    <div class="title">
                        <img src="{{asset('img/vray.svg')}}" alt="">
                        <span></span>
                        RHINO
                    </div>
                    <a href="#">Leer más <i class="material-icons">arrow_right_alt</i></a>
                    <img src="{{asset('img/airport.jpg')}}">
                </div>
                <div class="col-sm-12 col-md-6 product-item">
                    <div class="title">
                        <img src="{{asset('img/vray.svg')}}" alt="">
                        <span></span>
                        REVIT
                    </div>
                    <a href="#">Leer más <i class="material-icons">arrow_right_alt</i></a>
                    <img src="{{asset('img/shelter.jpg')}}">
                </div>
            </div>
        </div>
    </section>

    <section class="contacto">
        <h2>¿Deseas más información o una cotización?</h2>
        <div class="row mx-0">
            <div class="col-sm-12 col-md-6">
                <form action="POST" autocomplete="off">
                    <input type="text" name="nombre" placeholder="Nombre">
                    <input type="tel" name="telefono" placeholder="Teléfono">
                    <input type="text" name="empresa" placeholder="Empresa">
                    <input type="email" name="email" placeholder="Email">
                    <textarea name="mensaje" cols="30" rows="10" placeholder="Mensaje">
                    </textarea>
                    <input type="submit" value="Enviar mensaje">
                </form>
            </div>
            <div class="col-sm-12 col-md-6 map">
                <iframe id="google-map" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=reisa&key=AIzaSyBV_1x1YIQcd6LDRJdBfP4WxHXjRd_BcAU" allowfullscreen></iframe>
            </div>
        </div>
    </section>
@endsection
